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

use WBW\Library\XMLTV\Model\Writer;

/**
 * Array writers trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayWritersTrait {

    /**
     * Writers.
     *
     * @var Writer[]
     */
    private $writers;

    /**
     * Add a writer.
     *
     * @param Writer $writer The writer.
     */
    public function addWriter(Writer $writer) {
        $this->writers[] = $writer;
        return $this;
    }

    /**
     * Get the number of writers.
     *
     * @return int Returns the number of writers.
     */
    public function getNumberWriters() {
        return count($this->getWriters());
    }

    /**
     * Get the writers.
     *
     * @return Writer[] Returns the writers.
     */
    public function getWriters() {
        return $this->writers;
    }

    /**
     * Determines if this instance has writers.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasWriters() {
        return 1 <= $this->getNumberWriters();
    }

    /**
     * Set the writers.
     *
     * @param Writer[] $writers The writers.
     */
    protected function setWriters(array $writers) {
        $this->writers = $writers;
        return $this;
    }
}
