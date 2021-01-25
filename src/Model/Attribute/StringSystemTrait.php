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

/**
 * String system trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait StringSystemTrait {

    /**
     * System.
     *
     * @var string|null
     */
    protected $system;

    /**
     * Get the system.
     *
     * @return string|null Returns the system.
     */
    public function getSystem(): ?string {
        return $this->system;
    }

    /**
     * Set the system.
     *
     * @param string|null $system The system.
     * @return self Returns this instance.
     */
    public function setSystem(?string $system): self {
        $this->system = $system;
        return $this;
    }
}
