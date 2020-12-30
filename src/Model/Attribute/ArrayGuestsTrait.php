<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Model\Attribute;

use WBW\Library\XMLTV\Model\Guest;

/**
 * Array guests trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayGuestsTrait {

    /**
     * Guests.
     *
     * @var Guest[]
     */
    private $guests;

    /**
     * Add a guest.
     *
     * @param Guest $guest The guest.
     */
    public function addGuest(Guest $guest): self {
        $this->guests[] = $guest;
        return $this;
    }

    /**
     * Get the guests.
     *
     * @return Guest[] Returns the guests.
     */
    public function getGuests(): array {
        return $this->guests;
    }

    /**
     * Get the number of guests.
     *
     * @return int Returns the number of guests.
     */
    public function getNumberGuests(): int {
        return count($this->getGuests());
    }

    /**
     * Determines if this instance has guests.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasGuests(): bool {
        return 1 <= $this->getNumberGuests();
    }

    /**
     * Set the guests.
     *
     * @param Guest[] $guests The guests.
     */
    protected function setGuests(array $guests): self {
        $this->guests = $guests;
        return $this;
    }
}
