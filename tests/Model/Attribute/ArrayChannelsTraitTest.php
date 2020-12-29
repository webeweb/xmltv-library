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

use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayChannelsTrait;

/**
 * Array channels trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayChannelsTraitTest extends AbstractTestCase {

    /**
     * Tests the addChannel() method.
     *
     * @return void
     */
    public function testAddChannel(): void {

        // Set a Channel mock.
        $channel = new Channel();

        $obj = new TestArrayChannelsTrait();

        $obj->addChannel($channel);
        $this->assertSame($channel, $obj->getChannels()[0]);
        $this->assertEquals(1, $obj->getNumberChannels());
        $this->assertTrue($obj->hasChannels());
    }

    /**
     * Tests the indexChannelsById() method.
     *
     * @return void
     */
    public function testIndexChannelsById(): void {

        // Set the Channel mock.
        $channel1 = new Channel();
        $channel1->setId("1");
        $channel2 = new Channel();
        $channel2->setId("2");

        $obj = new TestArrayChannelsTrait();
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
    public function testSortChannels(): void {

        // Set the Channel mock.
        $channel1 = new Channel();
        $channel1->setId("1");
        $channel2 = new Channel();
        $channel2->setId("2");

        $obj = new TestArrayChannelsTrait();

        $obj->addChannel($channel2);
        $obj->addChannel($channel1);
        $this->assertEquals("2", $obj->getChannels()[0]->getId());
        $this->assertEquals("1", $obj->getChannels()[1]->getId());

        $obj->sortChannels();
        $this->assertEquals("1", $obj->getChannels()[0]->getId());
        $this->assertEquals("2", $obj->getChannels()[1]->getId());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayChannelsTrait();

        $this->assertEquals([], $obj->getChannels());
        $this->assertEquals(0, $obj->getNumberChannels());
        $this->assertFalse($obj->hasChannels());
    }
}
