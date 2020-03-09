<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Serializer;

use DateTime;
use DOMNode;
use DOMNodeList;
use Psr\Log\LoggerInterface;
use WBW\Library\XMLTV\Model\AbstractModel;

/**
 * XML deserializer helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Serializer
 */
class XmlDeserializerHelper {

    /**
     * Logger.
     *
     * @var LoggerInterface
     */
    protected static $logger;

    /**
     * Deserializes a child node.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    public static function deserializeChildNode(DomNode $domNode, $nodeName, AbstractModel $model) {

        $serializer = static::getMethodName("deserialize", $nodeName);
        $setter     = static::getMethodName("set", $nodeName);

        $node = static::getDOMNodeByName($nodeName, $domNode->childNodes);
        if (null !== $node) {
            $model->$setter(call_user_func_array(__NAMESPACE__ . "\\XmlDeserializer::" . $serializer, [$node]));
        }
    }

    /**
     * Deserializes the child nodes.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    public static function deserializeChildNodes(DomNode $domNode, $nodeName, AbstractModel $model) {

        $serializer = static::getMethodName("deserialize", $nodeName);
        $setter     = static::getMethodName("add", $nodeName);

        $nodes = static::getDOMNodesByName($nodeName, $domNode->childNodes);
        foreach ($nodes as $current) {
            $model->$setter(call_user_func_array(__NAMESPACE__ . "\\XmlDeserializer::" . $serializer, [$current]));
        }
    }

    /**
     * Deserializes a date/time.
     *
     * @param string $value The date/time.
     * @return DateTime|null Returns the date/time in case of success, null otherwise.
     */
    public static function deserializeDateTime($value) {

        $dateTime = DateTime::createFromFormat("YmdHis O", $value);
        if (false === $dateTime) {
            return null;
        }

        return $dateTime;
    }

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

        return trim($attribute->nodeValue);
    }

    /**
     * Get a DOM node by name.
     *
     * @param string $nodeName The node name.
     * @param DOMNodeList|null $domNodeList The DOM node list.
     * @return DOMNode|null Returns the DOM node in case of success, null otherwise.
     */
    public static function getDOMNodeByName($nodeName, DOMNodeList $domNodeList = null) {

        $domNodes = static::getDOMNodesByName($nodeName, $domNodeList);
        if (1 !== count($domNodes)) {
            return null;
        }

        return $domNodes[0];
    }

    /**
     * Get the DOM nodes by name.
     *
     * @param string $nodeName The node name.
     * @param DOMNodeList|null $domNodeList The DOM node list.
     * @return DOMNode[] Returns the DOM nodes.
     */
    public static function getDOMNodesByName($nodeName, DOMNodeList $domNodeList = null) {

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
     * Log.
     *
     * @param DOMNode $domNode The DOM node.
     * @return void
     */
    public static function log(DOMNode $domNode) {

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

        static::$logger->debug(sprintf("Deserialize a DOM node with name \"%s\"", $domNode->nodeName), $context);
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
