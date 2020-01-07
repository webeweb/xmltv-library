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

use WBW\Library\XMLTV\Parser\ParserHelper;

/**
 * String start trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait StringStartTrait {

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
     * Get the start into DateTime.
     *
     * @return DateTime|null Returns the start into DateTime in case of success, null otherwise.
     */
    public function getStartDateTime() {
        return ParserHelper::parseDateTime($this->start);
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
