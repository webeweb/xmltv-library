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

use WBW\Library\XmlTv\Model\Writer;
use WBW\Library\XmlTv\Tests\AbstractTestCase;

/**
 * Writer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model
 */
class WriterTest extends AbstractTestCase {

    /**
     * Tests xmlSerialize()
     *
     * @return void
     */
    public function testXmlSerialize(): void {

        $obj = new Writer();
        $obj->setContent("content");

        $res = '<writer>content</writer>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("writer", Writer::DOM_NODE_NAME);

        $obj = new Writer();

        $this->assertNull($obj->getContent());
    }
}
