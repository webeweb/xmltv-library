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
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Actor();
        $obj->setContent("content");
        $obj->setRole("role");

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("content", $res);
        $this->assertArrayHasKey("role", $res);
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

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Actor();
        $obj->setContent("content");
        $obj->setRole("role");

        $res = '<actor role="role">content</actor>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("actor", Actor::DOM_NODE_NAME);

        $obj = new Actor();

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getRole());
    }
}
