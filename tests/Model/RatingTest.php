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

        $this->assertNull($obj->getIcon());
        $this->assertNull($obj->getSystem());
        $this->assertNull($obj->getValue());
    }

    /**
     * Tests the setIcon() method.
     *
     * @return void
     */
    public function testSetIcon() {

        // Set an Icon mock.
        $aspect = new Icon();

        $obj = new Rating();

        $obj->setIcon($aspect);
        $this->assertSame($aspect, $obj->getIcon());
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
