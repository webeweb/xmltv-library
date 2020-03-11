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

use WBW\Library\XMLTV\Model\OrigLanguage;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Original language test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class OrigLanguageTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new OrigLanguage();

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getLang());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new OrigLanguage();
        $obj->setContent("content");
        $obj->setLang("lang");

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("content", $res);
        $this->assertArrayHasKey("lang", $res);
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new OrigLanguage();
        $obj->setContent("content");
        $obj->setLang("lang");

        $res = '<orig-language lang="lang">content</orig-language>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }
}
