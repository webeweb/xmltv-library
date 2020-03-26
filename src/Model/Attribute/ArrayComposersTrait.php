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

use WBW\Library\XMLTV\Model\Composer;

/**
 * Array composers trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayComposersTrait {

    /**
     * Composers.
     *
     * @var Composer[]
     */
    private $composers;

    /**
     * Add a composer.
     *
     * @param Composer $composer The composer.
     */
    public function addComposer(Composer $composer) {
        $this->composers[] = $composer;
        return $this;
    }

    /**
     * Get the composers.
     *
     * @return Composer[] Returns the composers.
     */
    public function getComposers() {
        return $this->composers;
    }

    /**
     * Get the number of composers.
     *
     * @return int Returns the number of composers.
     */
    public function getNumberComposers() {
        return count($this->getComposers());
    }

    /**
     * Determines if this instance has composers.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasComposers() {
        return 1 <= $this->getNumberComposers();
    }

    /**
     * Set the composers.
     *
     * @param Composer[] $composers The composers.
     */
    protected function setComposers(array $composers) {
        $this->composers = $composers;
        return $this;
    }
}
