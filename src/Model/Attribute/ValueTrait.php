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

use WBW\Library\XMLTV\Model\Value;

/**
 * Value trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ValueTrait {

    /**
     * Value.
     *
     * @var Value|null
     */
    private $value;

    /**
     * Get the value.
     *
     * @return Value|null Returns the value.
     */
    public function getValue(): ?Value {
        return $this->value;
    }

    /**
     * Set the value.
     *
     * @param Value|null $value The value.
     */
    public function setValue(?Value $value): self {
        $this->value = $value;
        return $this;
    }
}
