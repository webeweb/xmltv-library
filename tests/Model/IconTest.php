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

use WBW\Library\XMLTV\Model\Icon;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Icon test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class IconTest extends AbstractTestCase {

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Icon();

        $res = $obj->jsonSerialize();
        $this->assertCount(3, $res);

        $this->assertArrayHasKey("height", $res);
        $this->assertArrayHasKey("src", $res);
        $this->assertArrayHasKey("width", $res);
    }

    /**
     * Tests the setHeight() method.
     *
     * @return void
     */
    public function testSetHeight() {

        $obj = new Icon();

        $obj->setHeight(768);
        $this->assertEquals(768, $obj->getHeight());
    }

    /**
     * Tests the setSrc() method.
     *
     * @return void
     */
    public function testSetSrc() {

        $obj = new Icon();

        $obj->setSrc("src");
        $this->assertEquals("src", $obj->getSrc());
    }

    /**
     * Tests the setWidth() method.
     *
     * @return void
     */
    public function testSetWidth() {

        $obj = new Icon();
        $obj->setHeight("1080");
        $obj->setSrc("src");
        $obj->setWidth("1920");

        $obj->setWidth(1024);
        $this->assertEquals(1024, $obj->getWidth());
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Icon();
        $obj->setHeight("1080");
        $obj->setSrc("src");
        $obj->setWidth("1920");

        $res = '<icon src="src" width="1920" height="1080"/>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new Icon();

        $this->assertNull($obj->getHeight());
        $this->assertNull($obj->getSrc());
        $this->assertNull($obj->getWidth());
    }
}
