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

use WBW\Library\XMLTV\Model\TV;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

class TVTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TV();

        $this->assertNull($obj->getGeneratorInfoName());
        $this->assertNull($obj->getGeneratorInfoURL());
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
