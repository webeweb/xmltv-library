<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Serializer;

use DateTime;
use DOMNode;
use WBW\Library\Serializer\Helper\SerializerHelper as BaseSerializerHelper;
use WBW\Library\Serializer\Helper\XmlDeserializerHelper;
use WBW\Library\Serializer\Helper\XmlSerializerHelper;
use WBW\Library\Types\Helper\ArrayHelper;
use WBW\Library\Types\Helper\StringHelper;
use WBW\Library\XmlTv\Model\AbstractModel;
use WBW\Library\XmlTv\Model\SecondaryTitle;

/**
 * Serializer helper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Serializer
 */
class SerializerHelper extends BaseSerializerHelper {

    /**
     * Date/time format.
     *
     * @var string
     */
    const DATE_TIME_FORMAT = "YmdHis O";

    /**
     * Deserialize a date/time.
     *
     * @param string|null $value The date/time.
     * @return DateTime|null Returns the date/time in case of success, null otherwise.
     */
    public static function deserializeDateTime(?string $value): ?DateTime {

        $dateTime = DateTime::createFromFormat(self::DATE_TIME_FORMAT, $value);
        if (false === $dateTime) {
            return null;
        }

        return $dateTime;
    }

    /**
     * Create a DOM node.
     *
     * @param string $name The name.
     * @param string|null $value The value.
     * @param array $attributes The attributes.
     * @param bool $shortTag Short tag ?
     * @return string Returns the DOM node.
     */
    public static function domNode(string $name, ?string $value, array $attributes = [], bool $shortTag = false): string {

        $value = XmlSerializerHelper::xmlSerializeValue($value);

        foreach ($attributes as $k => $v) {
            $attributes[$k] = XmlSerializerHelper::xmlSerializeValue($v);
        }

        return StringHelper::domNode($name, $value, $attributes, $shortTag);
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

        $fct = __NAMESPACE__ . "\\JsonDeserializer::" . static::getMethodName("deserialize", $nodeName);
        $add = static::getMethodName("add", $nodeName);

        foreach ($array as $current) {

            if (0 === count($current)) {
                continue;
            }

            $model->$add(call_user_func($fct, $current));
        }
    }

    /**
     * Deserialize a model.
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

        $fct = __NAMESPACE__ . "\\JsonDeserializer::" . static::getMethodName("deserialize", $nodeName);
        $set = static::getMethodName("set", $nodeName);

        $model->$set(call_user_func($fct, $data));
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

        $fct = __NAMESPACE__ . "\\XmlDeserializer::" . static::getMethodName("deserialize", $nodeName);
        $add = static::getMethodName("add", $nodeName);

        $nodes = XmlDeserializerHelper::getDomNodesByName($nodeName, $domNode->childNodes);
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

        $fct = __NAMESPACE__ . "\\XmlDeserializer::" . static::getMethodName("deserialize", $nodeName);
        $set = static::getMethodName("set", $nodeName);

        $node = XmlDeserializerHelper::getDomNodeByName($nodeName, $domNode->childNodes);
        if (null !== $node) {
            $model->$set(call_user_func_array($fct, [$node]));
        }
    }
}
