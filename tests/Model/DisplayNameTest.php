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

use WBW\Library\XmlTv\Model\DisplayName;
use WBW\Library\XmlTv\Tests\AbstractTestCase;

/**
 * Display name test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Model
 */
class DisplayNameTest extends AbstractTestCase {

    /**
     * Tests jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new DisplayName();
        $obj->setContent("content");
        $obj->setLang("lang");

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("lang", $res);
        $this->assertArrayHasKey("content", $res);
    }

    /**
     * Tests xmlSerialize()
     *
     * @return void
     */
    public function testXmlSerialize(): void {

        $obj = new DisplayName();
        $obj->setContent("content");
        $obj->setLang("lang");

        $res = '<display-name lang="lang">content</display-name>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("display-name", DisplayName::DOM_NODE_NAME);

        $obj = new DisplayName();

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getLang());
    }
}
