<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Model;

/**
 * Length.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Length extends AbstractModel {

    /**
     * Units.
     *
     * @var string
     */
    private $units;

    /**
     * Get the content.
     *
     * @return int Returns the content.
     */
    public function getContent() {
        return parent::getContent();
    }

    /**
     * Get the units.
     *
     * @return string Returns the units.
     */
    public function getUnits() {
        return $this->units;
    }

    /**
     * Set the content.
     *
     * @param int $content The content.
     * @return Length Returns this length.
     */
    public function setContent($content) {
        return parent::setContent($content);
    }

    /**
     * Set the units.
     *
     * @param string $units The units.
     * @return Length Returns this length.
     */
    public function setUnits($units) {
        $this->units = $units;
        return $this;
    }
}
