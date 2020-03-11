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

use WBW\Library\XMLTV\Model\Url;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * URL test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class UrlTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Url();

        $this->assertNull($obj->getContent());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Url();
        $obj->setContent("content");

        $res = $obj->jsonSerialize();
        $this->assertCount(1, $res);

        $this->assertArrayHasKey("content", $res);
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Url();
        $obj->setContent("content");

        $res = '<url>content</url>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }
}
