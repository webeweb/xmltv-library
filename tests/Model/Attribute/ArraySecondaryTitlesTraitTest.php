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

use WBW\Library\XMLTV\Model\SecondaryTitle;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArraySecondaryTitlesTrait;

/**
 * Array secondary titles trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArraySecondaryTitlesTraitTest extends AbstractTestCase {

    /**
     * Tests the addSecondaryTitle() method.
     *
     * @return void
     */
    public function testAddSecondaryTitle() {

        // Set a Secondary title mock.
        $secondaryTitle = new SecondaryTitle();

        $obj = new TestArraySecondaryTitlesTrait();

        $obj->addSecondaryTitle($secondaryTitle);
        $this->assertSame($secondaryTitle, $obj->getSecondaryTitles()[0]);
        $this->assertEquals(1, $obj->getNumberSecondaryTitles());
        $this->assertTrue($obj->hasSecondaryTitles());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestArraySecondaryTitlesTrait();

        $this->assertEquals([], $obj->getSecondaryTitles());
        $this->assertEquals(0, $obj->getNumberSecondaryTitles());
        $this->assertFalse($obj->hasSecondaryTitles());
    }
}
