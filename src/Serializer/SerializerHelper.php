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
use WBW\Library\XMLTV\Model\SecondaryTitle;

/**
 * Serializer helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Serializer
 */
class SerializerHelper {

    /**
     * Logger.
     *
     * @var LoggerInterface|null
     */
    protected static $logger;

    /**
     * Deserialize a child node.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    public static function deserializeChildNode(DomNode $domNode, string $nodeName, AbstractModel $model): void {

        $fct = __NAMESPACE__ . "\\XmlDeserializer::" . static::getMethodName("deserialize", $nodeName);
        $set = static::getMethodName("set", $nodeName);

        $node = static::getDOMNodeByName($nodeName, $domNode->childNodes);
        if (null !== $node) {
            $model->$set(call_user_func_array($fct, [$node]));
        }
    }

    /**
     * Deserialize the child nodes.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    public static function deserializeChildNodes(DomNode $domNode, string $nodeName, AbstractModel $model): void {

        $fct = __NAMESPACE__ . "\\XmlDeserializer::" . static::getMethodName("deserialize", $nodeName);
        $add = static::getMethodName("add", $nodeName);

        $nodes = static::getDOMNodesByName($nodeName, $domNode->childNodes);
        foreach ($nodes as $current) {
            $model->$add(call_user_func_array($fct, [$current]));
        }
    }

    /**
     * Deserialize a date/time.
     *
     * @param string|null $value The date/time.
     * @return DateTime|null Returns the date/time in case of success, null otherwise.
     */
    public static function deserializeDateTime(?string $value): ?DateTime {

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
    public static function getDOMAttributeValue(DOMNode $domNode, string $attributeName): ?string {

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
    public static function getDOMNodeByName(string $nodeName, DOMNodeList $domNodeList = null): ?DOMNode {

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
    public static function getDOMNodesByName(string $nodeName, DOMNodeList $domNodeList = null): array {

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
     * @return LoggerInterface|null Returns the logger.
     */
    public static function getLogger(): ?LoggerInterface {
        return static::$logger;
    }

    /**
     * Get a method name.
     *
     * @param string $action The action.
     * @param string $attribute The attribute.
     * @return string Returns the method name.
     */
    public static function getMethodName(string $action, string $attribute): string {

        $method = "";

        $attribute = str_replace(SecondaryTitle::DOM_NODE_NAME, "secondary-title", $attribute);

        $parts = explode("-", $attribute);
        foreach ($parts as $current) {
            $method .= ucfirst($current);
        }

        return implode("", [$action, $method]);
    }

    /**
     * Log.
     *
     * @param DOMNode $domNode The DOM node.
     * @return void
     */
    public static function log(DOMNode $domNode): void {

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

        static::$logger->debug(sprintf('Deserialize a DOM node with name "%s"', $domNode->nodeName), $context);
    }

    /**
     * Set the logger.
     *
     * @param LoggerInterface|null $logger The logger.
     * @return void
     */
    public static function setLogger(?LoggerInterface $logger): void {
        static::$logger = $logger;
    }
}
