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
use WBW\Library\XMLTV\Model\TV;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * TV test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class TVTest extends AbstractTestCase {

    /**
     * Tests the addChannel() method.
     *
     * @return void
     */
    public function testAddChannel() {

        // Set a Channel mock.
        $channel = new Channel();

        $obj = new TV();

        $obj->addChannel($channel);
        $this->assertCount(1, $obj->getChannels());
        $this->assertSame($channel, $obj->getChannels()[0]);
    }

    /**
     * Tests the addProgramme() method.
     *
     * @return void
     */
    public function testAddProgramme() {

        // Set a Programme mock.
        $channel = new Programme();

        $obj = new TV();

        $obj->addProgramme($channel);
        $this->assertCount(1, $obj->getProgrammes());
        $this->assertSame($channel, $obj->getProgrammes()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TV();

        $this->assertEquals([], $obj->getChannels());
        $this->assertNull($obj->getGeneratorInfoName());
        $this->assertNull($obj->getGeneratorInfoURL());
        $this->assertEquals([], $obj->getProgrammes());
        $this->assertNull($obj->getSourceDataURL());
        $this->assertNull($obj->getSourceInfoURL());
    }

    /**
     * Tests the setGeneratorInfoName() method.
     *
     * @return void
     */
    public function testSetGeneratorInfoName() {

        $obj = new TV();

        $obj->setGeneratorInfoName("generatorInfoName");
        $this->assertEquals("generatorInfoName", $obj->getGeneratorInfoName());
    }

    /**
     * Tests the setGeneratorInfoURL() method.
     *
     * @return void
     */
    public function testSetGeneratorInfoURL() {

        $obj = new TV();

        $obj->setGeneratorInfoURL("generatorInfoURL");
        $this->assertEquals("generatorInfoURL", $obj->getGeneratorInfoURL());
    }

    /**
     * Tests the setSourceDataURL() method.
     *
     * @return void
     */
    public function testSetSourceDataURL() {

        $obj = new TV();

        $obj->setSourceDataURL("sourceDataURL");
        $this->assertEquals("sourceDataURL", $obj->getSourceDataURL());
    }

    /**
     * Tests the setSourceInfoURL() method.
     *
     * @return void
     */
    public function testSetSourceInfoURL() {

        $obj = new TV();

        $obj->setSourceInfoURL("sourceInfoURL");
        $this->assertEquals("sourceInfoURL", $obj->getSourceInfoURL());
    }
}
