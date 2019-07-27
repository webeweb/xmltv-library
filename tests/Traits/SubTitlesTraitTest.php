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

use WBW\Library\XMLTV\Model\SubTitle;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestSubTitlesTrait;

/**
 * Sub-titles trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class SubTitlesTraitTest extends AbstractTestCase {

    /**
     * Tests the addSubTitle() method.
     *
     * @return void
     */
    public function testAddSubTitle() {

        // Set a Sub-title mock.
        $subTitle = new SubTitle();

        $obj = new TestSubTitlesTrait();

        $obj->addSubTitle($subTitle);
        $this->assertCount(1, $obj->getSubTitles());
        $this->assertSame($subTitle, $obj->getSubTitles()[0]);
        $this->assertTrue($obj->hasSubTitles());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestSubTitlesTrait();

        $this->assertEquals([], $obj->getSubTitles());
        $this->assertFalse($obj->hasSubTitles());
    }
}
