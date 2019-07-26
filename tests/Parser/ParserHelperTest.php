<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Parser;

use WBW\Library\XMLTV\Parser\ParserHelper;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Parser helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Parser
 */
class ParserHelperTest extends AbstractTestCase {

    /**
     * Tests the getDOMAttributeValue() method.
     *
     * @return void
     */
    public function testGetDOMAttributeValue() {

        $tvNode          = $this->document->documentElement;
        $displayNameNode = $tvNode->childNodes->item(1)->childNodes->item(1);

        $this->assertNull(ParserHelper::getDOMAttributeValue($displayNameNode, ""));
        $this->assertNull(ParserHelper::getDOMAttributeValue($tvNode, ""));
        $this->assertEquals("date", ParserHelper::getDOMAttributeValue($tvNode, "date"));
    }

    /**
     * Tests the getDOMNodeByName() method.
     */
    public function testGetDOMNodeByName() {

        $tvNode = $this->document->documentElement;

        $res = ParserHelper::getDOMNodeByName($tvNode->childNodes, "channel");
        $this->assertNotNull($res);
        $this->assertEquals("channel", $res->nodeName);

        $this->assertNull(ParserHelper::getDOMNodeByName($tvNode->childNodes, "name"));;
    }

    /**
     * Tests the getDOMNodesByName() method.
     *
     * @return void
     */
    public function testGetDOMNodesByName() {

        $tvNode = $this->document->documentElement;

        $res = ParserHelper::getDOMNodesByName($tvNode->childNodes, "channel");
        $this->assertCount(1, $res);
        $this->assertEquals("channel", $res[0]->nodeName);
    }

    /**
     * Tests the getDOMNodesByName() method.
     *
     * @return void
     */
    public function testGetDOMNodesByNameWithNull() {

        $this->assertEquals([], ParserHelper::getDOMNodesByName(null, "channel"));
    }

    /**
     * Tests the getMethodName() method.
     *
     * @return void
     */
    public function testGetMethodeName() {

        $this->assertEquals("addDisplayName", ParserHelper::getMethodName("add", "display-name"));
        $this->assertEquals("setUrl", ParserHelper::getMethodName("set", "url"));
    }
}