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

use WBW\Library\XMLTV\Model\DisplayName;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayDisplayNamesTrait;

/**
 * Array display names trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayDisplayNamesTraitTest extends AbstractTestCase {

    /**
     * Tests the addDisplayName() method.
     *
     * @return void
     */
    public function testAddDisplayName() {

        // Set a Display name mock.
        $displayName = new DisplayName();

        $obj = new TestArrayDisplayNamesTrait();

        $obj->addDisplayName($displayName);
        $this->assertSame($displayName, $obj->getDisplayNames()[0]);
        $this->assertEquals(1, $obj->getNumberDisplayNames());
        $this->assertTrue($obj->hasDisplayNames());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestArrayDisplayNamesTrait();

        $this->assertEquals([], $obj->getDisplayNames());
        $this->assertEquals(0, $obj->getNumberDisplayNames());
        $this->assertFalse($obj->hasDisplayNames());
    }
}
