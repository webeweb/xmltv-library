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

use WBW\Library\XmlTv\Model\Title;
use WBW\Library\XmlTv\Tests\AbstractTestCase;

/**
 * Title test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Model
 */
class TitleTest extends AbstractTestCase {

    /**
     * Tests jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new Title();
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

        $obj = new Title();
        $obj->setContent("content");
        $obj->setLang("lang");

        $res = '<title lang="lang">content</title>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("title", Title::DOM_NODE_NAME);

        $obj = new Title();

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getLang());
    }
}
