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

use WBW\Library\XMLTV\Model\Category;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestCategoriesTrait;

/**
 * Categories trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class CategoriesTraitTest extends AbstractTestCase {

    /**
     * Tests the addCategory() method.
     *
     * @return void
     */
    public function testAddCategory() {

        // Set a Category mock.
        $category = new Category();

        $obj = new TestCategoriesTrait();

        $obj->addCategory($category);
        $this->assertCount(1, $obj->getCategories());
        $this->assertSame($category, $obj->getCategories()[0]);
        $this->assertTrue($obj->hasCategories());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestCategoriesTrait();

        $this->assertEquals([], $obj->getCategories());
        $this->assertFalse($obj->hasCategories());
    }
}
