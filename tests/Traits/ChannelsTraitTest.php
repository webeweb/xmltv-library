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

use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestChannelsTrait;

/**
 * Channels trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class ChannelsTraitTest extends AbstractTestCase {

    /**
     * Tests the addChannel() method.
     *
     * @return void
     */
    public function testAddChannel() {

        // Set a Channel mock.
        $channel = new Channel();

        $obj = new TestChannelsTrait();

        $obj->addChannel($channel);
        $this->assertCount(1, $obj->getChannels());
        $this->assertSame($channel, $obj->getChannels()[0]);
        $this->assertTrue($obj->hasChannels());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestChannelsTrait();

        $this->assertEquals([], $obj->getChannels());
        $this->assertFalse($obj->hasChannels());
    }

    /**
     * Tests the getChannelById() method.
     *
     * @return void
     */
    public function testGetChannelById() {

        // Set a Channel mock.
        $channel = new Channel();
        $channel->setId("id");

        $obj = new TestChannelsTrait();

        $this->assertNull($obj->getChannelById("id"));

        $obj->addChannel($channel);
        $this->assertSame($channel, $obj->getChannelById("id"));
    }
}
