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

use WBW\Library\XMLTV\Model\Programme;

/**
 * Programmes trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait ProgrammesTrait {

    /**
     * Programmes.
     *
     * @var Programme[]
     */
    private $programmes;

    /**
     * Add an programme.
     *
     * @param Programme $programme The programme.
     * @return ProgrammesTrait Returns this programmes trait.
     */
    public function addProgramme(Programme $programme) {
        $this->programmes[] = $programme;
        return $this;
    }

    /**
     * Get the programmes.
     *
     * @return Programme[] Returns the programmes.
     */
    public function getProgrammes() {
        return $this->programmes;
    }

    /**
     * Determines if this instance has programmes.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasProgrammes() {
        return 1 <= count($this->programmes);
    }

    /**
     * Set the programmes.
     *
     * @param Programme[] $programmes The programmes.
     * @return ProgrammesTrait Returns this programmes trait.
     */
    protected function setProgrammes(array $programmes) {
        $this->programmes = $programmes;
        return $this;
    }
}
