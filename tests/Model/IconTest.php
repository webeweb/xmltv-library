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

use WBW\Library\XMLTV\Model\Icon;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Icon test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class IconTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Icon();

        $this->assertNull($obj->getSrc());
    }

    /**
     * Tests the setSrc() method.
     *
     * @return void
     */
    public function testSetSrc() {

        $obj = new Icon();

        $obj->setSrc("src");
        $this->assertEquals("src", $obj->getSrc());
    }
}
