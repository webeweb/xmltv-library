<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Fixtures\Parser;

use DOMNode;
use DOMNodeList;
use WBW\Library\XMLTV\Parser\ParserHelper;

/**
 * Test parser helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Fixtures\Parser
 */
class TestParserHelper extends ParserHelper {

    /**
     * {@inheritDoc}
     */
    public static function getDOMAttributeValue(DOMNode $domNode, $attributeName) {
        return parent::getDOMAttributeValue($domNode, $attributeName);
    }

    /**
     * {@inheritDoc}
     */
    public static function getDOMNodeByName(DOMNodeList $domNodeList = null, $nodeName) {
        return parent::getDOMNodeByName($domNodeList, $nodeName);
    }

    /**
     * {@inheritDoc}
     */
    public static function getDOMNodesByName(DOMNodeList $domNodeList = null, $nodeName) {
        return parent::getDOMNodesByName($domNodeList, $nodeName);
    }

    /**
     * {@inheritDoc}
     */
    public static function getMethodName($type, $attribute) {
        return parent::getMethodName($type, $attribute);
    }
}
