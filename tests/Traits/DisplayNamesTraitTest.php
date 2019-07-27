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

use WBW\Library\XMLTV\Model\DisplayName;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestDisplayNamesTrait;

/**
 * Display names trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class DisplayNamesTraitTest extends AbstractTestCase {

    /**
     * Tests the addDisplayName() method.
     *
     * @return void
     */
    public function testAddDisplayName() {

        // Set a Display name mock.
        $displayName = new DisplayName();

        $obj = new TestDisplayNamesTrait();

        $obj->addDisplayName($displayName);
        $this->assertCount(1, $obj->getDisplayNames());
        $this->assertSame($displayName, $obj->getDisplayNames()[0]);
        $this->assertTrue($obj->hasDisplayNames());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestDisplayNamesTrait();

        $this->assertEquals([], $obj->getDisplayNames());
        $this->assertFalse($obj->hasDisplayNames());
    }
}
