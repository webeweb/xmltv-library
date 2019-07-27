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

use WBW\Library\XMLTV\Model\EpisodeNum;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestEpisodeNumsTrait;

/**
 * Episode numbers trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class EpisodeNumsTraitTest extends AbstractTestCase {

    /**
     * Tests the addEpisodeNum() method.
     *
     * @return void
     */
    public function testAddEpisodeNum() {

        // Set an Episode number mock.
        $episodeNum = new EpisodeNum();

        $obj = new TestEpisodeNumsTrait();

        $obj->addEpisodeNum($episodeNum);
        $this->assertCount(1, $obj->getEpisodeNums());
        $this->assertSame($episodeNum, $obj->getEpisodeNums()[0]);
        $this->assertTrue($obj->hasEpisodeNums());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestEpisodeNumsTrait();

        $this->assertEquals([], $obj->getEpisodeNums());
        $this->assertFalse($obj->hasEpisodeNums());
    }
}
