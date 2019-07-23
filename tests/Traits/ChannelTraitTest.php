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
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestChannelTrait;

/**
 * Channel trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class ChannelTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestChannelTrait();

        $this->assertNull($obj->getChannel());
    }

    /**
     * Tests the setChannel() method.
     *
     * @return void
     */
    public function testSetChannel() {

        $obj = new TestChannelTrait();

        $obj->setChannel("channel");
        $this->assertEquals("channel", $obj->getChannel());
    }
}
