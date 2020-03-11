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

use WBW\Library\XMLTV\Model\Stereo;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Stereo test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class StereoTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("bilingual", Stereo::CONTENT_BILINGUAL);
        $this->assertEquals("dolby", Stereo::CONTENT_DOLBY);
        $this->assertEquals("dolby digital", Stereo::CONTENT_DOLBY_DIGITAL);
        $this->assertEquals("mono", Stereo::CONTENT_MONO);
        $this->assertEquals("stereo", Stereo::CONTENT_STEREO);

        $obj = new Stereo();

        $this->assertNull($obj->getContent());
    }

    /**
     * Tests the enumContent() method.
     *
     * @return void
     */
    public function testEnumContent() {

        $res = [
            Stereo::CONTENT_BILINGUAL,
            Stereo::CONTENT_DOLBY,
            Stereo::CONTENT_DOLBY_DIGITAL,
            Stereo::CONTENT_MONO,
            Stereo::CONTENT_STEREO,
        ];
        $this->assertEquals($res, Stereo::enumContent());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Stereo();
        $obj->setContent("content");

        $res = $obj->jsonSerialize();
        $this->assertCount(1, $res);

        $this->assertArrayHasKey("content", $res);
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Stereo();
        $obj->setContent("content");

        $res = '<stereo>content</stereo>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }
}
