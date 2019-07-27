<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Traits;

use WBW\Library\XMLTV\Model\Programme;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestProgrammesTrait;

/**
 * Programmes trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class ProgrammesTraitTest extends AbstractTestCase {

    /**
     * Tests the addProgramme() method.
     *
     * @return void
     */
    public function testAddProgramme() {

        // Set a Programme mock.
        $programme = new Programme();

        $obj = new TestProgrammesTrait();

        $obj->addProgramme($programme);
        $this->assertCount(1, $obj->getProgrammes());
        $this->assertSame($programme, $obj->getProgrammes()[0]);
        $this->assertTrue($obj->hasProgrammes());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestProgrammesTrait();

        $this->assertEquals([], $obj->getProgrammes());
        $this->assertFalse($obj->hasProgrammes());
    }
}