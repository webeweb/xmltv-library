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

use WBW\Library\XMLTV\Model\Icon;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayIconsTrait;

/**
 * Array icons trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayIconsTraitTest extends AbstractTestCase {

    /**
     * Tests the addIcon() method.
     *
     * @return void
     */
    public function testAddIcon() {

        // Set an Icon mock.
        $icon = new Icon();

        $obj = new TestArrayIconsTrait();

        $obj->addIcon($icon);
        $this->assertCount(1, $obj->getIcons());
        $this->assertSame($icon, $obj->getIcons()[0]);
        $this->assertTrue($obj->hasIcons());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestArrayIconsTrait();

        $this->assertEquals([], $obj->getIcons());
        $this->assertFalse($obj->hasIcons());
    }
}
