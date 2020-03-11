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

use WBW\Library\XMLTV\Model\Writer;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Writer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class WriterTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Writer();

        $this->assertNull($obj->getContent());
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Writer();
        $obj->setContent("content");

        $res = '<writer>content</writer>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }
}
