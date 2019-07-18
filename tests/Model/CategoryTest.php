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

use WBW\Library\XMLTV\Model\Category;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Category test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class CategoryTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Category();

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getLang());
    }

    /**
     * Tests the setContent() method.
     *
     * @return void
     */
    public function testSetContent() {

        $obj = new Category();

        $obj->setContent("content");
        $this->assertEquals("content", $obj->getContent());
    }

    /**
     * Tests the setLang() method.
     *
     * @return void
     */
    public function testSetLang() {

        $obj = new Category();

        $obj->setLang("lang");
        $this->assertEquals("lang", $obj->getLang());
    }
}