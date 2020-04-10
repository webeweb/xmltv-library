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

use WBW\Library\XMLTV\Model\Keyword;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Keyword test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class KeywordTest extends AbstractTestCase {

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Keyword();
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

        $obj = new Keyword();
        $obj->setContent("content");
        $obj->setLang("lang");

        $res = '<keyword lang="lang">content</keyword>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new Keyword();

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getLang());
    }
}
