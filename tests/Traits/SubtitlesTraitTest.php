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

use WBW\Library\XMLTV\Model\Subtitles;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestSubtitlesTrait;

/**
 * Subtitles trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class SubtitlesTraitTest extends AbstractTestCase {

    /**
     * Tests the addSubtitles() method.
     *
     * @return void
     */
    public function testAddSubtitles() {

        // Set a Subtitles mock.
        $subtitles = new Subtitles();

        $obj = new TestSubtitlesTrait();

        $obj->addSubtitles($subtitles);
        $this->assertCount(1, $obj->getSubtitles());
        $this->assertSame($subtitles, $obj->getSubtitles()[0]);
        $this->assertTrue($obj->hasSubtitles());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestSubtitlesTrait();

        $this->assertEquals([], $obj->getSubtitles());
        $this->assertFalse($obj->hasSubtitles());
    }
}