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

use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestLangTrait;

/**
 * Lang trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class LangTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestLangTrait();

        $this->assertNull($obj->getLang());
    }

    /**
     * Tests the setLang() method.
     *
     * @return void
     */
    public function testSetLang() {

        $obj = new TestLangTrait();

        $obj->setLang("lang");
        $this->assertEquals("lang", $obj->getLang());
    }
}
