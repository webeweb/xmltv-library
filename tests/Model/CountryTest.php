<?php

declare(strict_types = 1);

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Model;

use WBW\Library\XmlTv\Model\Country;
use WBW\Library\XmlTv\Tests\AbstractTestCase;

/**
 * Country test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Model
 */
class CountryTest extends AbstractTestCase {

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new Country();
        $obj->setContent("content");
        $obj->setLang("lang");

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("lang", $res);
        $this->assertArrayHasKey("content", $res);
    }

    /**
     * Test xmlSerialize()
     *
     * @return void
     */
    public function testXmlSerialize(): void {

        $obj = new Country();
        $obj->setContent("content");
        $obj->setLang("lang");

        $res = '<country lang="lang">content</country>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("country", Country::DOM_NODE_NAME);

        $obj = new Country();

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getLang());
    }
}
