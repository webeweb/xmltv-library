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

use WBW\Library\XMLTV\Model\Programme;

/**
 * Array programmes trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayProgrammesTrait {

    /**
     * Programmes.
     *
     * @var Programme[]
     */
    private $programmes;

    /**
     * Add a programme.
     *
     * @param Programme $programme The programme.
     */
    public function addProgramme(Programme $programme): self{
        $this->programmes[] = $programme;
        return $this;
    }

    /**
     * Get the number of programmes.
     *
     * @return int Returns the number of programmes.
     */
    public function getNumberProgrammes(): int {
        return count($this->getProgrammes());
    }

    /**
     * Get the programmes.
     *
     * @return Programme[] Returns the programmes.
     */
    public function getProgrammes(): array {
        return $this->programmes;
    }

    /**
     * Determines if this instance has programmes.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasProgrammes(): bool {
        return 1 <= $this->getNumberProgrammes();
    }

    /**
     * Set the programmes.
     *
     * @param Programme[] $programmes The programmes.
     */
    protected function setProgrammes(array $programmes): self{
        $this->programmes = $programmes;
        return $this;
    }

    /**
     * Sort the programmes.
     */
    public function sortProgrammes(): self{
        usort($this->programmes, function(Programme $a, Programme $b) {
            return strcmp($a->getStart(), $b->getStart());
        });
        return $this;
    }
}
