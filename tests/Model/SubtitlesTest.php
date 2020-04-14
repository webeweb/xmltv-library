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

use Exception;
use InvalidArgumentException;
use WBW\Library\XMLTV\Model\Subtitles;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Subtitles test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class SubtitlesTest extends AbstractTestCase {

    /**
     * Tests the enumType() method.
     *
     * @return void
     */
    public function testEnumType() {

        $res = [
            Subtitles::TYPE_DEAF_SIGNED,
            Subtitles::TYPE_ONSCREEN,
            Subtitles::TYPE_TELETEXT,
        ];
        $this->assertEquals($res, Subtitles::enumType());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Subtitles();
        $obj->setLanguage($this->language);
        $obj->setType(Subtitles::TYPE_DEAF_SIGNED);

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("language", $res);
        $this->assertArrayHasKey("type", $res);
    }

    /**
     * Tests the setType() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSetType() {

        $obj = new Subtitles();

        $obj->setType("deaf-signed");
        $this->assertEquals("deaf-signed", $obj->getType());
    }

    /**
     * Tests the setType() method.
     *
     * @return void
     */
    public function testSetTypeWithInvalidArgumentException() {

        $obj = new Subtitles();

        try {

            $obj->setType("type");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The type \"type\" is invalid", $ex->getMessage());
        }
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Subtitles();
        $obj->setLanguage($this->language);
        $obj->setType(Subtitles::TYPE_DEAF_SIGNED);

        $res = '<subtitles type="deaf-signed"><language></language></subtitles>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("subtitles", Subtitles::DOM_NODE_NAME);
        $this->assertEquals("deaf-signed", Subtitles::TYPE_DEAF_SIGNED);
        $this->assertEquals("onscreen", Subtitles::TYPE_ONSCREEN);
        $this->assertEquals("teletext", Subtitles::TYPE_TELETEXT);

        $obj = new Subtitles();

        $this->assertNull($obj->getLanguage());
        $this->assertNull($obj->getType());
    }
}
