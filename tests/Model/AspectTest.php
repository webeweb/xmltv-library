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

use WBW\Library\XmlTv\Model\Aspect;
use WBW\Library\XmlTv\Tests\AbstractTestCase;

/**
 * Aspect test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Model
 */
class AspectTest extends AbstractTestCase {

    /**
     * Tests jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new Aspect();
        $obj->setContent("content");

        $res = $obj->jsonSerialize();
        $this->assertCount(1, $res);

        $this->assertArrayHasKey("content", $res);
    }

    /**
     * Tests xmlSerialize()
     *
     * @return void
     */
    public function testXmlSerialize(): void {

        $obj = new Aspect();
        $obj->setContent("content");

        $res = '<aspect>content</aspect>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("aspect", Aspect::DOM_NODE_NAME);

        $obj = new Aspect();

        $this->assertNull($obj->getContent());
    }
}
