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

use WBW\Library\XMLTV\Model\Adapter;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Adapter test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class AdapterTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Adapter();

        $this->assertNull($obj->getContent());
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Adapter();
        $obj->setContent("content");

        $res = '<adapter>content</adapter>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }
}
