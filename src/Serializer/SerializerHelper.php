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
use WBW\Library\Core\Argument\Helper\ArrayHelper;
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
     * Date/time format.
     *
     * @var string
     */
    const DATE_TIME_FORMAT = "YmdHis O";

    /**
     * Logger.
     *
     * @var LoggerInterface|null
     */
    protected static $logger;

    /**
     * Deserialize a date/time.
     *
     * @param string|null $value The date/time.
     * @return DateTime|null Returns the date/time in case of success, null otherwise.
     */
    public static function deserializeDateTime(?string $value): ?DateTime {

        $dateTime = DateTime::createFromFormat(SerializerHelper::DATE_TIME_FORMAT, $value);
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

        $domNodes = SerializerHelper::getDOMNodesByName($nodeName, $domNodeList);
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
        return SerializerHelper::$logger;
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
     * Deserialize an array.
     *
     * @param array $array The array.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    public static function jsonDeserializeArray(array $array, string $nodeName, AbstractModel $model): void {

        $fct = __NAMESPACE__ . "\\JsonDeserializer::" . SerializerHelper::getMethodName("deserialize", $nodeName);
        $add = SerializerHelper::getMethodName("add", $nodeName);

        foreach ($array as $current) {

            if (0 === count($current)) {
                continue;
            }

            $model->$add(call_user_func($fct, $current));
        }
    }

    /**
     * Deserialize an  model.
     *
     * @param array $array The array.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    public static function jsonDeserializeModel(array $array, string $nodeName, AbstractModel $model): void {

        $data = ArrayHelper::get($array, $nodeName, []);
        if (0 === count($data)) {
            return;
        }

        $fct = __NAMESPACE__ . "\\JsonDeserializer::" . SerializerHelper::getMethodName("deserialize", $nodeName);
        $set = SerializerHelper::getMethodName("set", $nodeName);

        $model->$set(call_user_func($fct, $data));
    }

    /**
     * Serialize an array.
     *
     * @param AbstractModel[] $models The models.
     * @return array Returns the serialized array.
     */
    public static function jsonSerializeArray(array $models): array {

        $output = [];

        foreach ($models as $current) {
            $output[] = SerializerHelper::jsonSerializeModel($current);
        }

        return $output;
    }

    /**
     * Serialize a model.
     *
     * @param AbstractModel|null $model The model.
     * @return array Returns the serialized model.
     */
    public static function jsonSerializeModel(?AbstractModel $model): array {

        if (null === $model) {
            return [];
        }

        return $model->jsonSerialize();
    }

    /**
     * Log.
     *
     * @param DOMNode $domNode The DOM node.
     * @return void
     */
    public static function log(DOMNode $domNode): void {

        if (null === SerializerHelper::getLogger()) {
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

        SerializerHelper::$logger->debug(sprintf('Deserialize a DOM node with name "%s"', $domNode->nodeName), $context);
    }

    /**
     * Set the logger.
     *
     * @param LoggerInterface|null $logger The logger.
     * @return void
     */
    public static function setLogger(?LoggerInterface $logger): void {
        SerializerHelper::$logger = $logger;
    }

    /**
     * Deserialize an array.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    public static function xmlDeserializeArray(DomNode $domNode, string $nodeName, AbstractModel $model): void {

        $fct = __NAMESPACE__ . "\\XmlDeserializer::" . SerializerHelper::getMethodName("deserialize", $nodeName);
        $add = SerializerHelper::getMethodName("add", $nodeName);

        $nodes = SerializerHelper::getDOMNodesByName($nodeName, $domNode->childNodes);
        foreach ($nodes as $current) {
            $model->$add(call_user_func_array($fct, [$current]));
        }
    }

    /**
     * Deserialize a model.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    public static function xmlDeserializeModel(DomNode $domNode, string $nodeName, AbstractModel $model): void {

        $fct = __NAMESPACE__ . "\\XmlDeserializer::" . SerializerHelper::getMethodName("deserialize", $nodeName);
        $set = SerializerHelper::getMethodName("set", $nodeName);

        $node = SerializerHelper::getDOMNodeByName($nodeName, $domNode->childNodes);
        if (null !== $node) {
            $model->$set(call_user_func_array($fct, [$node]));
        }
    }

    /**
     * Serialize an array.
     *
     * @param AbstractModel[] $models The models.
     * @return string Returns the serialized array.
     */
    public static function xmlSerializeArray(array $models): string {

        $output = [];

        foreach ($models as $current) {
            $output[] = SerializerHelper::xmlSerializeModel($current);
        }

        return implode("", $output);
    }

    /**
     * Serialize a model.
     *
     * @param AbstractModel|null $model The model.
     * @return string Returns the serialized model.
     */
    public static function xmlSerializeModel(?AbstractModel $model): string {

        if (null === $model) {
            return "";
        }

        return $model->xmlSerialize();
    }
}
