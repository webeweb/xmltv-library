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

use WBW\Library\XMLTV\Model\Director;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayDirectorsTrait;

/**
 * Array directors trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayDirectorsTraitTest extends AbstractTestCase {

    /**
     * Tests the addDirector() method.
     *
     * @return void
     */
    public function testAddDirector() {

        // Set a Director mock.
        $director = new Director();

        $obj = new TestArrayDirectorsTrait();

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

        $obj = new TestArrayDirectorsTrait();

        $this->assertEquals([], $obj->getDirectors());
        $this->assertFalse($obj->hasDirectors());
    }
}
