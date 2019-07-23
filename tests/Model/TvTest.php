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

use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Model\Programme;
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
     * Tests the addChannel() method.
     *
     * @return void
     */
    public function testAddChannel() {

        // Set a Channel mock.
        $channel = new Channel();

        $obj = new Tv();

        $obj->addChannel($channel);
        $this->assertCount(1, $obj->getChannels());
        $this->assertSame($channel, $obj->getChannels()[0]);
        $this->assertTrue($obj->hasChannels());
    }

    /**
     * Tests the addProgramme() method.
     *
     * @return void
     */
    public function testAddProgramme() {

        // Set a Programme mock.
        $channel = new Programme();

        $obj = new Tv();

        $obj->addProgramme($channel);
        $this->assertCount(1, $obj->getProgrammes());
        $this->assertSame($channel, $obj->getProgrammes()[0]);
        $this->assertTrue($obj->hasProgrammes());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Tv();

        $this->assertEquals([], $obj->getChannels());
        $this->assertNull($obj->getDate());
        $this->assertNull($obj->getGeneratorInfoName());
        $this->assertNull($obj->getGeneratorInfoURL());
        $this->assertEquals([], $obj->getProgrammes());
        $this->assertNull($obj->getSourceDataURL());
        $this->assertNull($obj->getSourceInfoName());
        $this->assertNull($obj->getSourceInfoURL());
        $this->assertFalse($obj->hasChannels());
        $this->assertFalse($obj->hasProgrammes());
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

        $obj->setGeneratorInfoURL("generatorInfoURL");
        $this->assertEquals("generatorInfoURL", $obj->getGeneratorInfoURL());
    }

    /**
     * Tests the setSourceDataURL() method.
     *
     * @return void
     */
    public function testSetSourceDataURL() {

        $obj = new Tv();

        $obj->setSourceDataURL("sourceDataURL");
        $this->assertEquals("sourceDataURL", $obj->getSourceDataURL());
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

        $obj->setSourceInfoURL("sourceInfoURL");
        $this->assertEquals("sourceInfoURL", $obj->getSourceInfoURL());
    }
}
