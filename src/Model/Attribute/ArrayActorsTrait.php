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

use WBW\Library\XMLTV\Model\Actor;

/**
 * Array actors trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayActorsTrait {

    /**
     * Actors.
     *
     * @var Actor[]
     */
    private $actors;

    /**
     * Add an actor.
     *
     * @param Actor $actor The actor.
     */
    public function addActor(Actor $actor) {
        $this->actors[] = $actor;
        return $this;
    }

    /**
     * Get the actors.
     *
     * @return Actor[] Returns the actors.
     */
    public function getActors() {
        return $this->actors;
    }

    /**
     * Determines if this instance has actors.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasActors() {
        return 1 <= count($this->actors);
    }

    /**
     * Set the actors.
     *
     * @param Actor[] $actors The actors.
     */
    protected function setActors(array $actors) {
        $this->actors = $actors;
        return $this;
    }
}
