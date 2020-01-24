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

use WBW\Library\XMLTV\Model\Rating;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Rating test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class RatingTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Rating();

        $this->assertEquals([], $obj->getIcons());
        $this->assertNull($obj->getSystem());
        $this->assertNull($obj->getValue());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Rating();

        $res = $obj->jsonSerialize();
        $this->assertCount(3, $res);

        $this->assertArrayHasKey("icons", $res);
        $this->assertArrayHasKey("system", $res);
        $this->assertArrayHasKey("value", $res);
    }

    /**
     * Tests the setSystem() method.
     *
     * @return void
     */
    public function testSetSystem() {

        $obj = new Rating();

        $obj->setSystem("system");
        $this->assertEquals("system", $obj->getSystem());
    }
}
