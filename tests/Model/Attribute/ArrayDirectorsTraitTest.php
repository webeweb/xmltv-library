<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Model\Attribute;

use WBW\Library\XmlTv\Model\Director;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestArrayDirectorsTrait;

/**
 * Array directors trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class ArrayDirectorsTraitTest extends AbstractTestCase {

    /**
     * Tests the addDirector() method.
     *
     * @return void
     */
    public function testAddDirector(): void {

        // Set a Director mock.
        $director = new Director();

        $obj = new TestArrayDirectorsTrait();

        $obj->addDirector($director);
        $this->assertSame($director, $obj->getDirectors()[0]);
        $this->assertEquals(1, $obj->getNumberDirectors());
        $this->assertTrue($obj->hasDirectors());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayDirectorsTrait();

        $this->assertEquals([], $obj->getDirectors());
        $this->assertEquals(0, $obj->getNumberDirectors());
        $this->assertFalse($obj->hasDirectors());
    }
}
