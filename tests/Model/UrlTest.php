<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Model;

use WBW\Library\XmlTv\Model\Url;
use WBW\Library\XmlTv\Tests\AbstractTestCase;

/**
 * URL test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model
 */
class UrlTest extends AbstractTestCase {

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize(): void {

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
    public function testXmlSerialize(): void {

        $obj = new Url();
        $obj->setContent("content");

        $res = '<url>content</url>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("url", Url::DOM_NODE_NAME);

        $obj = new Url();

        $this->assertNull($obj->getContent());
    }
}
