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

use WBW\Library\XMLTV\Model\Present;

/**
 * Present trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait PresentTrait {

    /**
     * Present.
     *
     * @var Present
     */
    private $present;

    /**
     * Get the present.
     *
     * @return Present Returns the present.
     */
    public function getPresent() {
        return $this->present;
    }

    /**
     * Set the present.
     *
     * @param Present|null $present The present.
     */
    public function setPresent(Present $present = null) {
        $this->present = $present;
        return $this;
    }

}
