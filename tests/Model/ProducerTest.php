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

use WBW\Library\XmlTv\Model\Producer;
use WBW\Library\XmlTv\Tests\AbstractTestCase;

/**
 * Producer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model
 */
class ProducerTest extends AbstractTestCase {

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize(): void {

        $obj = new Producer();
        $obj->setContent("content");

        $res = '<producer>content</producer>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("producer", Producer::DOM_NODE_NAME);

        $obj = new Producer();

        $this->assertNull($obj->getContent());
    }
}
