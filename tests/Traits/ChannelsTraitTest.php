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
     * Tests the indexChannelsById() method.
     *
     * @return void
     */
    public function testIndexChannelsById() {

        // Set the Channel mock.
        $channel1 = new Channel();
        $channel1->setId("1");
        $channel2 = new Channel();
        $channel2->setId("2");

        $obj = new TestChannelsTrait();
        $obj->addChannel($channel2);
        $obj->addChannel($channel1);

        $res = $obj->indexChannelsById();
        $this->assertArrayHasKey("1", $res);
        $this->assertArrayHasKey("2", $res);

        $this->assertSame($channel1, $res["1"]);
        $this->assertSame($channel2, $res["2"]);
    }

    /**
     * Tests the sortChannels() method.
     *
     * @return void
     */
    public function testSortChannels() {

        // Set the Channel mock.
        $channel1 = new Channel();
        $channel1->setId("1");
        $channel2 = new Channel();
        $channel2->setId("2");

        $obj = new TestChannelsTrait();

        $obj->addChannel($channel2);
        $obj->addChannel($channel1);
        $this->assertEquals("2", $obj->getChannels()[0]->getId());
        $this->assertEquals("1", $obj->getChannels()[1]->getId());

        $obj->sortChannels();
        $this->assertEquals("1", $obj->getChannels()[0]->getId());
        $this->assertEquals("2", $obj->getChannels()[1]->getId());
    }
}
