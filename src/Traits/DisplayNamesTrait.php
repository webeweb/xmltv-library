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

use WBW\Library\XMLTV\Model\DisplayName;

/**
 * Display names trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait DisplayNamesTrait {

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
     * @return DisplayNamesTrait Returns this display names trait.
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
    public function getDisplayNames() {
        return $this->displayNames;
    }

    /**
     * Determines if this channel has display names.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasDisplayNames() {
        return 1 <= count($this->displayNames);
    }

    /**
     * Set the display names.
     *
     * @param DisplayName[] $displayNames The display names.
     * @return DisplayNamesTrait Returns this display names trait.
     */
    protected function setDisplayNames(array $displayNames) {
        $this->displayNames = $displayNames;
        return $this;
    }
}