<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Parser;

use DateTime;
use DOMNode;
use DOMNodeList;
use Psr\Log\LoggerInterface;
use WBW\Library\XMLTV\Model\AbstractModel;

/**
 * Parser helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Parser
 */
class ParserHelper {

    /**
     * Logger.
     *
     * @var LoggerInterface
     */
    private static $logger;

    /**
     * Get a DOM attribute value.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $attributeName The attribute name.
     * @return string|null Returns the attribute value in case of success, null otherwise.
     */
    public static function getDOMAttributeValue(DOMNode $domNode, $attributeName) {

        if (null === $domNode->attributes || null === $domNode->attributes->getNamedItem($attributeName)) {
            return null;
        }

        $attribute = $domNode->attributes->getNamedItem($attributeName);

        return $attribute->nodeValue;
    }

    /**
     * Get a DOM node by name.
     *
     * @param DOMNodeList|null $domNodeList The DOM node list.
     * @param string $nodeName The node name.
     * @return DOMNode|null Returns the DOM node in case of success, null otherwise.
     */
    public static function getDOMNodeByName(DOMNodeList $domNodeList = null, $nodeName) {

        $domNodes = static::getDOMNodesByName($domNodeList, $nodeName);
        if (1 !== count($domNodes)) {
            return null;
        }

        return $domNodes[0];
    }

    /**
     * Get the DOM nodes by name.
     *
     * @param DOMNodeList|null $domNodeList The DOM node list.
     * @param string $nodeName The node name.
     * @return DOMNode[] Returns the DOM nodes.
     */
    public static function getDOMNodesByName(DOMNodeList $domNodeList = null, $nodeName) {

        if (null === $domNodeList) {
            return [];
        }

        $domNodes = [];

        /** @var DOMNode $current */
        foreach ($domNodeList as $current) {

            if ($nodeName !== $current->nodeName) {
                continue;
            }

            $domNodes[] = $current;
        }

        return $domNodes;
    }

    /**
     * Get the logger.
     *
     * @return LoggerInterface Returns the logger.
     */
    public static function getLogger() {
        return static::$logger;
    }

    /**
     * Get a method name.
     *
     * @param string $leftPart The left part.
     * @param string $rightPart The right part.
     * @return string Returns the method name.
     */
    public static function getMethodName($leftPart, $rightPart) {

        $method = "";

        $rightPart = str_replace("sub-title", "secondary-title", $rightPart);

        $parts = explode("-", $rightPart);
        foreach ($parts as $current) {
            $method .= ucfirst($current);
        }

        return implode("", [$leftPart, $method]);
    }

    /**
     * Log an info.
     *
     * @param DOMNode $domNode The DOM node.
     * @return void
     */
    public static function logInfo(DOMNode $domNode) {

        if (null === static::getLogger()) {
            return;
        }

        $context = [];

        /** @var DOMNode $current */
        foreach ($domNode->attributes as $current) {
            $context["_attributes"][] = [$current->nodeName => $current->nodeValue];
        }

        /** @var DOMNode $current */
        foreach ($domNode->childNodes as $current) {
            $context["_children"][] = $current->nodeName;
        }

        static::$logger->info(sprintf("Parses a DOM node with name \"%s\"", $domNode->nodeName), $context);
    }

    /**
     * Parses a child node.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    public static function parseChildNode(DomNode $domNode, $nodeName, AbstractModel $model) {

        $parser = static::getMethodName("parse", $nodeName);
        $setter = static::getMethodName("set", $nodeName);

        $node = static::getDOMNodeByName($domNode->childNodes, $nodeName);
        if (null !== $node) {
            $model->$setter(call_user_func_array(__NAMESPACE__ . "\\Parser::" . $parser, [$node]));
        }
    }

    /**
     * Parses the child nodes.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    public static function parseChildNodes(DomNode $domNode, $nodeName, AbstractModel $model) {

        $parser = static::getMethodName("parse", $nodeName);
        $setter = static::getMethodName("add", $nodeName);

        $nodes = static::getDOMNodesByName($domNode->childNodes, $nodeName);
        foreach ($nodes as $current) {
            $model->$setter(call_user_func_array(__NAMESPACE__ . "\\Parser::" . $parser, [$current]));
        }
    }

    /**
     * Parses a date/time.
     *
     * @param string $value The date/time.
     * @return DateTime|null Returns the date/time in case of success, null otherwise.
     */
    public static function parseDateTime($value) {
        $result = DateTime::createFromFormat("YmdHis O", $value);
        if (false === $result) {
            return null;
        }
        return $result;
    }

    /**
     * Set the logger.
     *
     * @param LoggerInterface|null $logger The logger.
     * @return void
     */
    public static function setLogger(LoggerInterface $logger = null) {
        static::$logger = $logger;
    }
}
