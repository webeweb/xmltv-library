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
    protected $directors;

    /**
     * Add a director.
     *
     * @param Director $director The director.
     * @return self Returns this instance.
     */
    public function addDirector(Director $director): self {
        $this->directors[] = $director;
        return $this;
    }

    /**
     * Get the directors.
     *
     * @return Director[] Returns the directors.
     */
    public function getDirectors(): array {
        return $this->directors;
    }

    /**
     * Get the number of directors.
     *
     * @return int Returns the number of directors.
     */
    public function getNumberDirectors(): int {
        return count($this->getDirectors());
    }

    /**
     * Determines if this instance has directors.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasDirectors(): bool {
        return 1 <= $this->getNumberDirectors();
    }

    /**
     * Set the directors.
     *
     * @param Director[] $directors The directors.
     * @return self Returns this instance.
     */
    protected function setDirectors(array $directors): self {
        $this->directors = $directors;
        return $this;
    }
}
