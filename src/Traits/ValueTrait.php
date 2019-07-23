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

use WBW\Library\XMLTV\Model\Value;

/**
 * Value trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait ValueTrait {

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
     * @param Value $value The value.
     */
    public function setValue(Value $value = null) {
        $this->value = $value;
        return $this;
    }

}
