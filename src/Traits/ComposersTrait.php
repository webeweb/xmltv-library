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

use WBW\Library\XMLTV\Model\Composer;

/**
 * Composers trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait ComposersTrait {

    /**
     * Composers.
     *
     * @var Composer[]
     */
    private $composers;

    /**
     * Add an composer.
     *
     * @param Composer $composer The composer.
     * @return ComposersTrait Returns this composers trait.
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
     * Determines if this instance has composers.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasComposers() {
        return 1 <= count($this->composers);
    }

    /**
     * Set the composers.
     *
     * @param Composer[] $composers The composers.
     * @return ComposersTrait Returns this composers trait.
     */
    protected function setComposers(array $composers) {
        $this->composers = $composers;
        return $this;
    }
}
