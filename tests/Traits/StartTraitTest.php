<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Traits;

use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestStartTrait;

/**
 * Start trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class StartTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestStartTrait();

        $this->assertNull($obj->getStart());
    }

    /**
     * Tests the setStart() method.
     *
     * @return void
     */
    public function testSetStart() {

        $obj = new TestStartTrait();

        $obj->setStart("start");
        $this->assertEquals("start", $obj->getStart());
    }
}
