<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Model\Attribute;

use WBW\Library\XMLTV\Model\Programme;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayProgrammesTrait;

/**
 * Array programmes trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayProgrammesTraitTest extends AbstractTestCase {

    /**
     * Tests the addProgramme() method.
     *
     * @return void
     */
    public function testAddProgramme() {

        // Set a Programme mock.
        $programme = new Programme();

        $obj = new TestArrayProgrammesTrait();

        $obj->addProgramme($programme);
        $this->assertSame($programme, $obj->getProgrammes()[0]);
        $this->assertEquals(1, $obj->getNumberProgrammes());
        $this->assertTrue($obj->hasProgrammes());
    }

    /**
     * Tests the sortProgrammes() method.
     *
     * @return void
     */
    public function testSortProgrammes() {

        // Set the Programme mocks.
        $programme1 = new Programme();
        $programme1->setStart("1");
        $programme2 = new Programme();
        $programme2->setStart("2");

        $obj = new TestArrayProgrammesTrait();

        $obj->addProgramme($programme2);
        $obj->addProgramme($programme1);
        $this->assertEquals("2", $obj->getProgrammes()[0]->getStart());
        $this->assertEquals("1", $obj->getProgrammes()[1]->getStart());

        $obj->sortProgrammes();
        $this->assertEquals("1", $obj->getProgrammes()[0]->getStart());
        $this->assertEquals("2", $obj->getProgrammes()[1]->getStart());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestArrayProgrammesTrait();

        $this->assertEquals([], $obj->getProgrammes());
        $this->assertEquals(0, $obj->getNumberProgrammes());
        $this->assertFalse($obj->hasProgrammes());
    }
}
