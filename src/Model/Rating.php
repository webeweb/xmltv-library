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

use WBW\Library\XMLTV\Traits\SystemTrait;
use WBW\Library\XMLTV\Traits\ValueTrait;

/**
 * Rating.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Rating extends AbstractModel {

    use SystemTrait;
    use ValueTrait;

    /**
     * Icon.
     *
     * @var Icon
     */
    private $icon;

    /**
     * Get the icon.
     *
     * @return Icon Returns the icon.
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * Set the icon.
     *
     * @param Icon|null $icon The icon.
     * @return Rating Returns this rating.
     */
    public function setIcon(Icon $icon = null) {
        $this->icon = $icon;
        return $this;
    }
}
