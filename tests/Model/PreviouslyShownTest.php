<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Model;

use WBW\Library\XMLTV\Model\PreviouslyShown;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Previously shown test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class PreviouslyShownTest extends AbstractTestCase {

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new PreviouslyShown();
        $obj->setChannel("channel");
        $obj->setStart("start");

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("channel", $res);
        $this->assertArrayHasKey("start", $res);
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize(): void {

        $obj = new PreviouslyShown();
        $obj->setChannel("channel");
        $obj->setStart("start");

        $res = '<previously-shown channel="channel" start="start"/>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("previously-shown", PreviouslyShown::DOM_NODE_NAME);

        $obj = new PreviouslyShown();

        $this->assertNull($obj->getChannel());
        $this->assertNull($obj->getStart());
        $this->assertNull($obj->getStartDateTime());
    }
}
