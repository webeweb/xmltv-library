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

use WBW\Library\XMLTV\Model\EpisodeNum;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayEpisodeNumsTrait;

/**
 * Array episode numbers trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayEpisodeNumsTraitTest extends AbstractTestCase {

    /**
     * Tests the addEpisodeNum() method.
     *
     * @return void
     */
    public function testAddEpisodeNum() {

        // Set an Episode number mock.
        $episodeNum = new EpisodeNum();

        $obj = new TestArrayEpisodeNumsTrait();

        $obj->addEpisodeNum($episodeNum);
        $this->assertSame($episodeNum, $obj->getEpisodeNums()[0]);
        $this->assertEquals(1, $obj->getNumberEpisodeNums());
        $this->assertTrue($obj->hasEpisodeNums());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestArrayEpisodeNumsTrait();

        $this->assertEquals([], $obj->getEpisodeNums());
        $this->assertEquals(0, $obj->getNumberEpisodeNums());
        $this->assertFalse($obj->hasEpisodeNums());
    }
}
