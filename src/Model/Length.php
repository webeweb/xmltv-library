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
use WBW\Library\Core\Model\Attribute\StringContentTrait;
use WBW\Library\XMLTV\Serializer\JsonSerializer;
use WBW\Library\XMLTV\Serializer\XmlSerializer;

/**
 * Length.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Length extends AbstractModel {

    use StringContentTrait;

    /**
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "length";

    /**
     * Units "hours".
     *
     * @var string
     */
    const UNITS_HOURS = "hours";

    /**
     * Units "minutes".
     *
     * @var string
     */
    const UNITS_MINUTES = "minutes";

    /**
     * Units "seconds".
     *
     * @var string
     */
    const UNITS_SECONDS = "seconds";

    /**
     * Units.
     *
     * @var string
     */
    private $units;

    /**
     * Enumerate the units.
     *
     * @return string[] Returns the units enumeration.
     */
    public static function enumUnits() {
        return [
            self::UNITS_HOURS,
            self::UNITS_MINUTES,
            self::UNITS_SECONDS,
        ];
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
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return JsonSerializer::serializeLength($this);
    }

    /**
     * Set the units.
     *
     * @param string $units The units.
     * @return Length Returns this length.
     * @throws InvalidArgumentException Throws an invalid argument exception if the units is invalid.
     */
    public function setUnits($units) {
        if (null !== $units && false === in_array($units, static::enumUnits())) {
            throw new InvalidArgumentException(sprintf("The units \"%s\" is invalid", $units));
        }
        $this->units = $units;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize() {
        return XmlSerializer::serializeLength($this);
    }
}
