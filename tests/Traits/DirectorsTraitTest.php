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

use WBW\Library\XMLTV\Model\Director;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestDirectorsTrait;

/**
 * Directors trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class DirectorsTraitTest extends AbstractTestCase {

    /**
     * Tests the addDirector() method.
     *
     * @return void
     */
    public function testAddDirector() {

        // Set an Director mock.
        $director = new Director();

        $obj = new TestDirectorsTrait();

        $obj->addDirector($director);
        $this->assertCount(1, $obj->getDirectors());
        $this->assertSame($director, $obj->getDirectors()[0]);
        $this->assertTrue($obj->hasDirectors());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestDirectorsTrait();

        $this->assertEquals([], $obj->getDirectors());
        $this->assertFalse($obj->hasDirectors());
    }
}
