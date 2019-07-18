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
 * Star rating.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class StarRating extends AbstractModel {

    /**
     * Value.
     *
     * @var Value
     */
    private $value;

    /**
     * Get the value.
     *
     * @return Value Returns the value.
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * Set the value.
     *
     * @param Value|null $value The value.
     * @return StarRating Returns this star rating.
     */
    public function setValue(Value $value = null) {
        $this->value = $value;
        return $this;
    }
}
