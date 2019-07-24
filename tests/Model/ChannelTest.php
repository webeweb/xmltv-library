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
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Channel test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class ChannelTest extends AbstractTestCase {

    /**
     * Tests the addDisplayName() method.
     *
     * @return void
     */
    public function testAddDisplayName() {

        // Set a Display name mock.
        $icon = new DisplayName();

        $obj = new Channel();

        $obj->addDisplayName($icon);
        $this->assertCount(1, $obj->getDisplayNames());
        $this->assertSame($icon, $obj->getDisplayNames()[0]);
        $this->assertTrue($obj->hasDisplayNames());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Channel();

        $this->assertEquals([], $obj->getDisplayNames());
        $this->assertEquals([], $obj->getIcons());
        $this->assertNull($obj->getId());
        $this->assertEquals([], $obj->getUrls());
        $this->assertFalse($obj->hasDisplayNames());
        $this->assertFalse($obj->hasIcons());
        $this->assertFalse($obj->hasUrls());
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
