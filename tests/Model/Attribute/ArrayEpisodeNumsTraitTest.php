<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Model\Attribute;

use WBW\Library\XmlTv\Model\EpisodeNum;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestArrayEpisodeNumsTrait;

/**
 * Array episode numbers trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class ArrayEpisodeNumsTraitTest extends AbstractTestCase {

    /**
     * Tests addEpisodeNum()
     *
     * @return void
     */
    public function testAddEpisodeNum(): void {

        // Set an Episode number mock.
        $episodeNum = new EpisodeNum();

        $obj = new TestArrayEpisodeNumsTrait();

        $obj->addEpisodeNum($episodeNum);
        $this->assertSame($episodeNum, $obj->getEpisodeNums()[0]);
        $this->assertEquals(1, $obj->getNumberEpisodeNums());
        $this->assertTrue($obj->hasEpisodeNums());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayEpisodeNumsTrait();

        $this->assertEquals([], $obj->getEpisodeNums());
        $this->assertEquals(0, $obj->getNumberEpisodeNums());
        $this->assertFalse($obj->hasEpisodeNums());
    }
}
