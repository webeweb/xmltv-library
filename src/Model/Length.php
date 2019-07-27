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

use InvalidArgumentException;
use WBW\Library\XMLTV\Traits\ContentTrait;

/**
 * Length.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Length extends AbstractModel {

    use ContentTrait;

    /**
     * Units.
     *
     * @var string
     */
    private $units;

    /**
     * Get the units.
     *
     * @return string Returns the units.
     */
    public function getUnits() {
        return $this->units;
    }

    /**
     * Set the units.
     *
     * @param string $units The units.
     * @return Length Returns this length.
     * @throws InvalidArgumentException Throws an invalid argument exception if the units is invalid.
     */
    public function setUnits($units) {
        if (null !== $units && false === in_array($units, ["hours", "minutes", "seconds"])) {
            throw new InvalidArgumentException(sprintf("The units \"%s\" is invalid", $units));
        }
        $this->units = $units;
        return $this;
    }
}
