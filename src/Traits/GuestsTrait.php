<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Traits;

use WBW\Library\XMLTV\Model\Guest;

/**
 * Guests trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait GuestsTrait {

    /**
     * Guests.
     *
     * @var Guest[]
     */
    private $guests;

    /**
     * Add an guest.
     *
     * @param Guest $guest The guest.
     * @return GuestsTrait Returns this guests trait.
     */
    public function addGuest(Guest $guest) {
        $this->guests[] = $guest;
        return $this;
    }

    /**
     * Get the guests.
     *
     * @return Guest[] Returns the guests.
     */
    public function getGuests() {
        return $this->guests;
    }

    /**
     * Determines if this instance has guests.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasGuests() {
        return 1 <= count($this->guests);
    }

    /**
     * Set the guests.
     *
     * @param Guest[] $guests The guests.
     * @return GuestsTrait Returns this guests trait.
     */
    protected function setGuests(array $guests) {
        $this->guests = $guests;
        return $this;
    }
}
