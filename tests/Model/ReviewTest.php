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
use WBW\Library\XMLTV\Model\Review;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Review test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class ReviewTest extends AbstractTestCase {

    /**
     * Tests the enumType() method.
     *
     * @return void
     */
    public function testEnumType() {

        $res = [
            Review::TYPE_TEXT,
            Review::TYPE_URL,
        ];
        $this->assertEquals($res, Review::enumType());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Review();
        $obj->setLang("lang");
        $obj->setReviewer("reviewer");
        $obj->setSource("source");
        $obj->setType(Review::TYPE_TEXT);

        $res = $obj->jsonSerialize();
        $this->assertCount(4, $res);

        $this->assertArrayHasKey("lang", $res);
        $this->assertArrayHasKey("reviewer", $res);
        $this->assertArrayHasKey("source", $res);
        $this->assertArrayHasKey("type", $res);
    }

    /**
     * Tests the setReviewer() method.
     *
     * @return void
     */
    public function testSetReviewer() {

        $obj = new Review();

        $obj->setReviewer("reviewer");
        $this->assertEquals("reviewer", $obj->getReviewer());
    }

    /**
     * Tests the setSource() method.
     *
     * @return void
     */
    public function testSetSource() {

        $obj = new Review();

        $obj->setSource("source");
        $this->assertEquals("source", $obj->getSource());
    }

    /**
     * Tests the setType() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSetType() {

        $obj = new Review();

        $obj->setType("text");
        $this->assertEquals("text", $obj->getType());
    }

    /**
     * Tests the setType() method.
     *
     * @return void
     */
    public function testSetTypeWithInvalidArgumentException() {

        $obj = new Review();

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

        $obj = new Review();
        $obj->setLang("lang");
        $obj->setReviewer("reviewer");
        $obj->setSource("source");
        $obj->setType(Review::TYPE_TEXT);

        $res = '<review type="text" source="source" reviewer="reviewer" lang="lang"/>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("text", Review::TYPE_TEXT);
        $this->assertEquals("url", Review::TYPE_URL);

        $obj = new Review();

        $this->assertNull($obj->getLang());
        $this->assertNull($obj->getReviewer());
        $this->assertNull($obj->getSource());
        $this->assertNull($obj->getType());
    }
}
