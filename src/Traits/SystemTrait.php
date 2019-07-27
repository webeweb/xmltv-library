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

/**
 * System trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait SystemTrait {

    /**
     * System.
     *
     * @var string
     */
    private $system;

    /**
     * Get the system.
     *
     * @return string Returns the system.
     */
    public function getSystem() {
        return $this->system;
    }

    /**
     * Set the system.
     *
     * @param string $system The system.
     */
    public function setSystem($system) {
        $this->system = $system;
        return $this;
    }
}
