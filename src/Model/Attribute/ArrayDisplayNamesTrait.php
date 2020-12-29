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

use WBW\Library\XMLTV\Model\DisplayName;

/**
 * Array display names trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayDisplayNamesTrait {

    /**
     * Display name.
     *
     * @var DisplayName[]
     */
    private $displayNames;

    /**
     * Add a display name.
     *
     * @param DisplayName $displayName The display name.
     */
    public function addDisplayName(DisplayName $displayName) {
        $this->displayNames[] = $displayName;
        return $this;
    }

    /**
     * Get the display names.
     *
     * @return DisplayName[] Returns the display names.
     */
    public function getDisplayNames(): array {
        return $this->displayNames;
    }

    /**
     * Get the number of display names.
     *
     * @return int Returns the number of display names.
     */
    public function getNumberDisplayNames(): int {
        return count($this->getDisplayNames());
    }

    /**
     * Determines if this channel has display names.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasDisplayNames(): bool {
        return 1 <= $this->getNumberDisplayNames();
    }

    /**
     * Set the display names.
     *
     * @param DisplayName[] $displayNames The display names.
     */
    protected function setDisplayNames(array $displayNames) {
        $this->displayNames = $displayNames;
        return $this;
    }
}
