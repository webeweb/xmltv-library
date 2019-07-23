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

use WBW\Library\XMLTV\Model\Icon;

/**
 * Icons trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait IconsTrait {

    /**
     * Icons.
     *
     * @var Icon[]
     */
    private $icons;

    /**
     * Add an icon.
     *
     * @param Icon $icon The icon.
     */
    public function addIcon(Icon $icon) {
        $this->icons[] = $icon;
        return $this;
    }

    /**
     * Get the icons.
     *
     * @return Icon[] Returns the icons.
     */
    public function getIcons() {
        return $this->icons;
    }

    /**
     * Determines if this instance has icons.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasIcons() {
        return 1 <= count($this->icons);
    }

    /**
     * Set the icons.
     *
     * @param Icon[] $icons The icons.
     */
    protected function setIcons(array $icons) {
        $this->icons = $icons;
        return $this;
    }
}