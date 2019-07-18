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

use WBW\Library\XMLTV\Model\Date;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Date test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class DateTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Date();

        $this->assertNull($obj->getContent());
    }

    /**
     * Tests the setContent() method.
     *
     * @return void
     */
    public function testSetContent() {

        $obj = new Date();

        $obj->setContent(1);
        $this->assertEquals(1, $obj->getContent());
    }
}
