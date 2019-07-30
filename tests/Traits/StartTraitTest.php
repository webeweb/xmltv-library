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

use DateTime;
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
        $this->assertNull($obj->getStartDateTime());
    }

    /**
     * Tests the setStart() method.
     *
     * @return void
     */
    public function testSetStart() {

        $obj = new TestStartTrait();

        $obj->setStart("20190730180000 +0200");
        $this->assertEquals("20190730180000 +0200", $obj->getStart());

        $this->assertInstanceOf(DateTime::class, $obj->getStartDateTime());
    }
}
