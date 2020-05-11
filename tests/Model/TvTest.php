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

use WBW\Library\XMLTV\Model\Tv;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * TV test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class TvTest extends AbstractTestCase {

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Tv();
        $obj->setDate("date");
        $obj->setGeneratorInfoName("generatorInfoName");
        $obj->setGeneratorInfoURL("generatorInfoUrl");
        $obj->setSourceDataUrl("sourceDataUrl");
        $obj->setSourceInfoName("sourceInfoName");
        $obj->setSourceInfoUrl("sourceInfoUrl");
        $obj->addChannel($this->channel);
        $obj->addProgramme($this->programme);

        $res = $obj->jsonSerialize();
        $this->assertCount(8, $res);

        $this->assertArrayHasKey("date", $res);
        $this->assertArrayHasKey("generatorInfoName", $res);
        $this->assertArrayHasKey("generatorInfoUrl", $res);
        $this->assertArrayHasKey("sourceDataUrl", $res);
        $this->assertArrayHasKey("sourceInfoName", $res);
        $this->assertArrayHasKey("sourceInfoUrl", $res);
        $this->assertArrayHasKey("channels", $res);
        $this->assertArrayHasKey("programmes", $res);
    }

    /**
     * Tests the setDate() method.
     *
     * @return void
     */
    public function testSetDate() {

        $obj = new Tv();

        $obj->setDate("date");
        $this->assertEquals("date", $obj->getDate());
    }

    /**
     * Tests the setGeneratorInfoName() method.
     *
     * @return void
     */
    public function testSetGeneratorInfoName() {

        $obj = new Tv();

        $obj->setGeneratorInfoName("generatorInfoName");
        $this->assertEquals("generatorInfoName", $obj->getGeneratorInfoName());
    }

    /**
     * Tests the setGeneratorInfoURL() method.
     *
     * @return void
     */
    public function testSetGeneratorInfoURL() {

        $obj = new Tv();

        $obj->setGeneratorInfoUrl("generatorInfoUrl");
        $this->assertEquals("generatorInfoUrl", $obj->getGeneratorInfoUrl());
    }

    /**
     * Tests the setSourceDataURL() method.
     *
     * @return void
     */
    public function testSetSourceDataURL() {

        $obj = new Tv();

        $obj->setSourceDataUrl("sourceDataUrl");
        $this->assertEquals("sourceDataUrl", $obj->getSourceDataUrl());
    }

    /**
     * Tests the setSourceInfoName() method.
     *
     * @return void
     */
    public function testSetSourceInfoName() {

        $obj = new Tv();

        $obj->setSourceInfoName("sourceInfoName");
        $this->assertEquals("sourceInfoName", $obj->getSourceInfoName());
    }

    /**
     * Tests the setSourceInfoURL() method.
     *
     * @return void
     */
    public function testSetSourceInfoURL() {

        $obj = new Tv();

        $obj->setSourceInfoUrl("sourceInfoUrl");
        $this->assertEquals("sourceInfoUrl", $obj->getSourceInfoUrl());
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Tv();
        $obj->setDate("date");
        $obj->setGeneratorInfoName("generatorInfoName");
        $obj->setGeneratorInfoURL("generatorInfoUrl");
        $obj->setSourceDataUrl("sourceDataUrl");
        $obj->setSourceInfoName("sourceInfoName");
        $obj->setSourceInfoUrl("sourceInfoUrl");
        $obj->addChannel($this->channel);
        $obj->addProgramme($this->programme);

        $res = '<tv date="date" generator-info-name="generatorInfoName" generator-info-url="generatorInfoUrl" source-data-url="sourceDataUrl" source-info-name="sourceInfoName" source-info-url="sourceInfoUrl"><channel></channel><programme></programme></tv>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("tv", Tv::DOM_NODE_NAME);

        $obj = new Tv();

        $this->assertEquals([], $obj->getChannels());
        $this->assertNull($obj->getDate());
        $this->assertNull($obj->getGeneratorInfoName());
        $this->assertNull($obj->getGeneratorInfoUrl());
        $this->assertEquals([], $obj->getProgrammes());
        $this->assertNull($obj->getSourceDataUrl());
        $this->assertNull($obj->getSourceInfoName());
        $this->assertNull($obj->getSourceInfoUrl());
    }
}
