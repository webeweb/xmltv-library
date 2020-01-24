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

use WBW\Library\XMLTV\Model\Aspect;
use WBW\Library\XMLTV\Model\Colour;
use WBW\Library\XMLTV\Model\Quality;
use WBW\Library\XMLTV\Model\Video;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Video test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class VideoTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Video();

        $this->assertNull($obj->getAspect());
        $this->assertNull($obj->getColour());
        $this->assertNull($obj->getPresent());
        $this->assertNull($obj->getQuality());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Video();

        $res = $obj->jsonSerialize();
        $this->assertCount(4, $res);

        $this->assertArrayHasKey("aspect", $res);
        $this->assertArrayHasKey("colour", $res);
        $this->assertArrayHasKey("present", $res);
        $this->assertArrayHasKey("quality", $res);
    }

    /**
     * Tests the setAspect() method.
     *
     * @return void
     */
    public function testSetAspect() {

        // Set an Aspect mock.
        $aspect = new Aspect();

        $obj = new Video();

        $obj->setAspect($aspect);
        $this->assertSame($aspect, $obj->getAspect());
    }

    /**
     * Tests the setColour() method.
     *
     * @return void
     */
    public function testSetColour() {

        // Set a Colour mock.
        $aspect = new Colour();

        $obj = new Video();

        $obj->setColour($aspect);
        $this->assertSame($aspect, $obj->getColour());
    }

    /**
     * Tests the setQuality() method.
     *
     * @return void
     */
    public function testSetQuality() {

        // Set a Quality mock.
        $aspect = new Quality();

        $obj = new Video();

        $obj->setQuality($aspect);
        $this->assertSame($aspect, $obj->getQuality());
    }
}
