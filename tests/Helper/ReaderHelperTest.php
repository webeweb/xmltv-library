<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Helper;

use WBW\Library\XMLTV\Helper\ReaderHelper;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Reader helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Helper
 */
class ReaderHelperTest extends AbstractTestCase {

    /**
     * Tests the getDOMAttributeValue() method.
     *
     * @return void
     */
    public function testGetDOMAttributeValue() {

        $tvNode          = $this->document->documentElement;
        $displayNameNode = $tvNode->childNodes->item(1)->childNodes->item(1);

        $this->assertNull(ReaderHelper::getDOMAttributeValue($displayNameNode, ""));
        $this->assertNull(ReaderHelper::getDOMAttributeValue($tvNode, ""));
        $this->assertEquals("https://api.github.com", ReaderHelper::getDOMAttributeValue($tvNode, "source-info-url"));
    }

    /**
     * Tests the getDOMNodeByName() method.
     */
    public function testGetDOMNodeByName() {

        $tvNode = $this->document->documentElement;

        $res = ReaderHelper::getDOMNodeByName($tvNode->childNodes, "channel");
        $this->assertNotNull($res);
        $this->assertEquals("channel", $res->nodeName);

        $this->assertNull(ReaderHelper::getDOMNodeByName($tvNode->childNodes, "name"));;
    }

    /**
     * Tests the getDOMNodesByName() method.
     *
     * @return void
     */
    public function testGetDOMNodesByName() {

        $tvNode = $this->document->documentElement;

        $res = ReaderHelper::getDOMNodesByName($tvNode->childNodes, "channel");
        $this->assertCount(1, $res);
        $this->assertEquals("channel", $res[0]->nodeName);
    }

    /**
     * Tests the getDOMNodesByName() method.
     *
     * @return void
     */
    public function testGetDOMNodesByNameWithNull() {

        $this->assertEquals([], ReaderHelper::getDOMNodesByName(null, "channel"));
    }
}
