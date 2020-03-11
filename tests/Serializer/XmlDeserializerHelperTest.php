<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Serializer;

use DateTime;
use Psr\Log\LoggerInterface;
use WBW\Library\XMLTV\Serializer\XmlDeserializerHelper;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * XML deserializer helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Serializer
 */
class XmlDeserializerHelperTest extends AbstractTestCase {

    /**
     * Tests the deserializeDateTime() method.
     *
     * @return void
     */
    public function testDeserializeDateTime() {

        $res = XmlDeserializerHelper::deserializeDateTime("20190731180000 +0200");
        $this->assertInstanceOf(DateTime::class, $res);
        $this->assertEquals("2019-07-31 18:00:00", $res->format("Y-m-d H:i:s"));

        $this->assertNull(XmlDeserializerHelper::deserializeDateTime("exception"));
    }

    /**
     * Tests the getDOMAttributeValue() method.
     *
     * @return void
     */
    public function testGetDOMAttributeValue() {

        $tvNode          = $this->document->documentElement;
        $displayNameNode = $tvNode->childNodes->item(1)->childNodes->item(1);

        $this->assertNull(XmlDeserializerHelper::getDOMAttributeValue($displayNameNode, ""));
        $this->assertNull(XmlDeserializerHelper::getDOMAttributeValue($tvNode, ""));
        $this->assertEquals("date", XmlDeserializerHelper::getDOMAttributeValue($tvNode, "date"));
    }

    /**
     * Tests the getDOMNodeByName() method.
     *
     * @return void
     */
    public function testGetDOMNodeByName() {

        $tvNode = $this->document->documentElement;

        $res = XmlDeserializerHelper::getDOMNodeByName("channel", $tvNode->childNodes);
        $this->assertNotNull($res);
        $this->assertEquals("channel", $res->nodeName);

        $this->assertNull(XmlDeserializerHelper::getDOMNodeByName("name", $tvNode->childNodes));
    }

    /**
     * Tests the getDOMNodesByName() method.
     *
     * @return void
     */
    public function testGetDOMNodesByName() {

        $tvNode = $this->document->documentElement;

        $res = XmlDeserializerHelper::getDOMNodesByName("channel", $tvNode->childNodes);
        $this->assertCount(1, $res);
        $this->assertEquals("channel", $res[0]->nodeName);
    }

    /**
     * Tests the getDOMNodesByName() method.
     *
     * @return void
     */
    public function testGetDOMNodesByNameWithNull() {

        $this->assertEquals([], XmlDeserializerHelper::getDOMNodesByName("channel", null));
    }

    /**
     * Tests the getMethodName() method.
     *
     * @return void
     */
    public function testGetMethodName() {

        $this->assertEquals("addDisplayName", XmlDeserializerHelper::getMethodName("add", "display-name"));
        $this->assertEquals("setUrl", XmlDeserializerHelper::getMethodName("set", "url"));
    }

    /**
     * Tests the setLogger() method.
     *
     * @return void
     */
    public function testSetLogger() {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        XmlDeserializerHelper::setLogger($logger);
        $this->assertSame($logger, XmlDeserializerHelper::getLogger());

        // Unset the mock.
        XmlDeserializerHelper::setLogger(null);
    }
}
