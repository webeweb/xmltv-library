<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Helper;

use DOMNode;
use DOMNodeList;

/**
 * Reader helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Helper
 */
class ReaderHelper {

    /**
     * Get a DOM attribute value.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $attributeName The attribute name.
     * @return string|null Returns the attribute value in case of success, null otherwise.
     */
    public static function getDOMAttributeValue(DOMNode $domNode, $attributeName) {

        $attributes = $domNode->attributes;
        if (null === $attributes) {
            return null;
        }

        $attribute = $attributes->getNamedItem($attributeName);
        if (null === $attribute) {
            return null;
        }

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
}
