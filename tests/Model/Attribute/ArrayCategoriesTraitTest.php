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

use WBW\Library\XmlTv\Model\Category;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestArrayCategoriesTrait;

/**
 * Array categories trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class ArrayCategoriesTraitTest extends AbstractTestCase {

    /**
     * Tests addCategory()
     *
     * @return void
     */
    public function testAddCategory(): void {

        // Set a Category mock.
        $category = new Category();

        $obj = new TestArrayCategoriesTrait();

        $obj->addCategory($category);
        $this->assertSame($category, $obj->getCategories()[0]);
        $this->assertEquals(1, $obj->getNumberCategories());
        $this->assertTrue($obj->hasCategories());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayCategoriesTrait();

        $this->assertEquals([], $obj->getCategories());
        $this->assertEquals(0, $obj->getNumberCategories());
        $this->assertFalse($obj->hasCategories());
    }
}
