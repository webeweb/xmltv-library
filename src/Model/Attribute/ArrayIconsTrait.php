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

use WBW\Library\XMLTV\Model\Icon;

/**
 * Array icons trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayIconsTrait {

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
    public function getIcons(): array {
        return $this->icons;
    }

    /**
     * Get the number of icons.
     *
     * @return int Returns the number of icons.
     */
    public function getNumberIcons(): int {
        return count($this->getIcons());
    }

    /**
     * Determines if this instance has icons.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasIcons(): bool {
        return 1 <= $this->getNumberIcons();
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
