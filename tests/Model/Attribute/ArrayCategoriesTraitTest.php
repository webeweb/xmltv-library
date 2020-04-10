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

use WBW\Library\XMLTV\Model\Category;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayCategoriesTrait;

/**
 * Array categories trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayCategoriesTraitTest extends AbstractTestCase {

    /**
     * Tests the addCategory() method.
     *
     * @return void
     */
    public function testAddCategory() {

        // Set a Category mock.
        $category = new Category();

        $obj = new TestArrayCategoriesTrait();

        $obj->addCategory($category);
        $this->assertSame($category, $obj->getCategories()[0]);
        $this->assertEquals(1, $obj->getNumberCategories());
        $this->assertTrue($obj->hasCategories());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestArrayCategoriesTrait();

        $this->assertEquals([], $obj->getCategories());
        $this->assertEquals(0, $obj->getNumberCategories());
        $this->assertFalse($obj->hasCategories());
    }
}
