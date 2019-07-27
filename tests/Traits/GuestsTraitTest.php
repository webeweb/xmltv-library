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

use WBW\Library\XMLTV\Model\Guest;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestGuestsTrait;

/**
 * Guests trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class GuestsTraitTest extends AbstractTestCase {

    /**
     * Tests the addGuest() method.
     *
     * @return void
     */
    public function testAddGuest() {

        // Set an Guest mock.
        $guest = new Guest();

        $obj = new TestGuestsTrait();

        $obj->addGuest($guest);
        $this->assertCount(1, $obj->getGuests());
        $this->assertSame($guest, $obj->getGuests()[0]);
        $this->assertTrue($obj->hasGuests());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestGuestsTrait();

        $this->assertEquals([], $obj->getGuests());
        $this->assertFalse($obj->hasGuests());
    }
}
