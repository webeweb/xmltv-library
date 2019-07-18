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

use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Model\DisplayName;
use WBW\Library\XMLTV\Model\Icon;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Channel test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class ChannelTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Channel();

        $this->assertNull($obj->getDisplayName());
        $this->assertNull($obj->getIcon());
        $this->assertNull($obj->getId());
    }

    /**
     * Tests the setDisplayName() method.
     *
     * @return void
     */
    public function testSetDisplayName() {

        // Set a Display name mock.
        $icon = new DisplayName();

        $obj = new Channel();

        $obj->setDisplayName($icon);
        $this->assertSame($icon, $obj->getDisplayName());
    }

    /**
     * Tests the setIcon() method.
     *
     * @return void
     */
    public function testSetIcon() {

        // Set a Icon mock.
        $icon = new Icon();

        $obj = new Channel();

        $obj->setIcon($icon);
        $this->assertSame($icon, $obj->getIcon());
    }

    /**
     * Tests the setId() method.
     *
     * @return void
     */
    public function testSetId() {

        $obj = new Channel();

        $obj->setId("id");
        $this->assertEquals("id", $obj->getId());
    }
}
