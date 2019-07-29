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

use WBW\Library\XMLTV\Model\SecondaryTitle;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestSecondaryTitlesTrait;

/**
 * Secondary titles trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class SecondaryTitlesTraitTest extends AbstractTestCase {

    /**
     * Tests the addSecondaryTitle() method.
     *
     * @return void
     */
    public function testAddSecondaryTitle() {

        // Set a Secondary title mock.
        $secondaryTitle = new SecondaryTitle();

        $obj = new TestSecondaryTitlesTrait();

        $obj->addSecondaryTitle($secondaryTitle);
        $this->assertCount(1, $obj->getSecondaryTitles());
        $this->assertSame($secondaryTitle, $obj->getSecondaryTitles()[0]);
        $this->assertTrue($obj->hasSecondaryTitles());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestSecondaryTitlesTrait();

        $this->assertEquals([], $obj->getSecondaryTitles());
        $this->assertFalse($obj->hasSecondaryTitles());
    }
}
