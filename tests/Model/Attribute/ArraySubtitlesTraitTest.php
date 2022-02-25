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

use WBW\Library\XmlTv\Model\Subtitles;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestArraySubtitlesTrait;

/**
 * Array subtitles trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class ArraySubtitlesTraitTest extends AbstractTestCase {

    /**
     * Tests addSubtitles()
     *
     * @return void
     */
    public function testAddSubtitles(): void {

        // Set a Subtitles mock.
        $subtitles = new Subtitles();

        $obj = new TestArraySubtitlesTrait();

        $obj->addSubtitles($subtitles);
        $this->assertSame($subtitles, $obj->getSubtitles()[0]);
        $this->assertEquals(1, $obj->getNumberSubtitles());
        $this->assertTrue($obj->hasSubtitles());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArraySubtitlesTrait();

        $this->assertEquals([], $obj->getSubtitles());
        $this->assertEquals(0, $obj->getNumberSubtitles());
        $this->assertFalse($obj->hasSubtitles());
    }
}
