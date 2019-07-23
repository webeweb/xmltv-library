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

use WBW\Library\XMLTV\Model\Actor;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Actor test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class ActorTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Actor();

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getRole());
    }

    /**
     * Tests the setRole() method.
     *
     * @return void
     */
    public function testSetRole() {

        $obj = new Actor();

        $obj->setRole("role");
        $this->assertEquals("role", $obj->getRole());
    }
}
