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

use WBW\Library\XMLTV\Model\Present;

/**
 * Present present trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait PresentPresentTrait {

    /**
     * Present.
     *
     * @var Present|null
     */
    protected $present;

    /**
     * Get the present.
     *
     * @return Present|null Returns the present.
     */
    public function getPresent(): ?Present {
        return $this->present;
    }

    /**
     * Set the present.
     *
     * @param Present|null $present The present.
     * @return self Returns this instance.
     */
    public function setPresent(?Present $present): self {
        $this->present = $present;
        return $this;
    }
}
