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

use WBW\Library\XMLTV\Model\Director;

/**
 * Array directors trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayDirectorsTrait {

    /**
     * Directors.
     *
     * @var Director[]
     */
    private $directors;

    /**
     * Add a director.
     *
     * @param Director $director The director.
     */
    public function addDirector(Director $director) {
        $this->directors[] = $director;
        return $this;
    }

    /**
     * Get the directors.
     *
     * @return Director[] Returns the directors.
     */
    public function getDirectors() {
        return $this->directors;
    }

    /**
     * Determines if this instance has directors.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasDirectors() {
        return 1 <= count($this->directors);
    }

    /**
     * Set the directors.
     *
     * @param Director[] $directors The directors.
     */
    protected function setDirectors(array $directors) {
        $this->directors = $directors;
        return $this;
    }
}
