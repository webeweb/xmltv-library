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
use WBW\Library\XMLTV\Serializer\SerializerHelper;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Serializer helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Serializer
 */
class SerializerHelperTest extends AbstractTestCase {

    /**
     * Tests the deserializeDateTime() method.
     *
     * @return void
     */
    public function testDeserializeDateTime(): void {

        $res = SerializerHelper::deserializeDateTime("20190731180000 +0200");
        $this->assertInstanceOf(DateTime::class, $res);
        $this->assertEquals("2019-07-31 18:00:00", $res->format("Y-m-d H:i:s"));

        $this->assertNull(SerializerHelper::deserializeDateTime("exception"));
    }

    /**
     * Tests the getDOMAttributeValue() method.
     *
     * @return void
     */
    public function testGetDOMAttributeValue(): void {

        $tvNode = $this->document->documentElement;
        $dnNode = $tvNode->childNodes->item(1)->childNodes->item(1);

        $this->assertNull(SerializerHelper::getDOMAttributeValue($dnNode, ""));
        $this->assertNull(SerializerHelper::getDOMAttributeValue($tvNode, ""));
        $this->assertEquals("date", SerializerHelper::getDOMAttributeValue($tvNode, "date"));
    }

    /**
     * Tests the getDOMNodeByName() method.
     *
     * @return void
     */
    public function testGetDOMNodeByName(): void {

        $tvNode = $this->document->documentElement;

        $res = SerializerHelper::getDOMNodeByName("channel", $tvNode->childNodes);
        $this->assertNotNull($res);
        $this->assertEquals("channel", $res->nodeName);

        $this->assertNull(SerializerHelper::getDOMNodeByName("name", $tvNode->childNodes));
    }

    /**
     * Tests the getDOMNodesByName() method.
     *
     * @return void
     */
    public function testGetDOMNodesByName(): void {

        $tvNode = $this->document->documentElement;

        $res = SerializerHelper::getDOMNodesByName("channel", $tvNode->childNodes);
        $this->assertCount(1, $res);
        $this->assertEquals("channel", $res[0]->nodeName);
    }

    /**
     * Tests the getDOMNodesByName() method.
     *
     * @return void
     */
    public function testGetDOMNodesByNameWithNull(): void {

        $this->assertEquals([], SerializerHelper::getDOMNodesByName("channel", null));
    }

    /**
     * Tests the getMethodName() method.
     *
     * @return void
     */
    public function testGetMethodName(): void {

        $this->assertEquals("addDisplayName", SerializerHelper::getMethodName("add", "display-name"));
        $this->assertEquals("setUrl", SerializerHelper::getMethodName("set", "url"));
    }

    /**
     * Tests the setLogger() method.
     *
     * @return void
     */
    public function testSetLogger(): void {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        SerializerHelper::setLogger($logger);
        $this->assertSame($logger, SerializerHelper::getLogger());

        // Unset the mock.
        SerializerHelper::setLogger(null);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("YmdHis O", SerializerHelper::DATE_TIME_FORMAT);
    }
}
