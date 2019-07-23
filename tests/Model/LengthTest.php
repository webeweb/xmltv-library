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

use WBW\Library\XMLTV\Model\Length;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Length test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class LengthTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Length();

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getUnits());
    }

    /**
     * Tests the setUnits() method.
     *
     * @return void
     */
    public function testSetUnits() {

        $obj = new Length();

        $obj->setUnits("units");
        $this->assertEquals("units", $obj->getUnits());
    }
}
