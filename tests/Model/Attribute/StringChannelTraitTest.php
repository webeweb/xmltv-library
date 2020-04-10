<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Model\Attribute;

use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestStringChannelTrait;

/**
 * String channel trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class StringChannelTraitTest extends AbstractTestCase {

    /**
     * Tests the setChannel() method.
     *
     * @return void
     */
    public function testSetChannel() {

        $obj = new TestStringChannelTrait();

        $obj->setChannel("channel");
        $this->assertEquals("channel", $obj->getChannel());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestStringChannelTrait();

        $this->assertNull($obj->getChannel());
    }
}
