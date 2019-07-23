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
 * Start trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait StartTrait {

    /**
     * Start.
     *
     * @var string
     */
    private $start;

    /**
     * Get the start.
     *
     * @return string Returns the start.
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * Set the start.
     *
     * @param string $start The start.
     */
    public function setStart($start) {
        $this->start = $start;
        return $this;
    }
}
