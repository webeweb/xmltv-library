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
 * Rating.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Rating extends AbstractModel {

    /**
     * Icon.
     *
     * @var Icon
     */
    private $icon;

    /**
     * System.
     *
     * @var string
     */
    private $system;

    /**
     * Value.
     *
     * @var Value
     */
    private $value;

    /**
     * Get the icon.
     *
     * @return Icon Returns the icon.
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * Get tje system.
     *
     * @return string Returns the system.
     */
    public function getSystem() {
        return $this->system;
    }

    /**
     * Get the value.
     *
     * @return Value Returns the value.
     */
    public function getValue() {
        return $this->value;
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

    /**
     * Set the system.
     *
     * @param string $system The system.
     * @return Rating Returns this rating.
     */
    public function setSystem($system) {
        $this->system = $system;
        return $this;
    }

    /**
     * Set the value.
     *
     * @param Value|null $value The value.
     * @return Rating Returns this rating.
     */
    public function setValue(Value $value = null) {
        $this->value = $value;
        return $this;
    }
}
