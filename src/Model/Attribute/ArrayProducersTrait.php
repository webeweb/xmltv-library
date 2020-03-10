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

use WBW\Library\XMLTV\Model\Producer;

/**
 * Array producers trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayProducersTrait {

    /**
     * Producers.
     *
     * @var Producer[]
     */
    private $producers;

    /**
     * Add a producer.
     *
     * @param Producer $producer The producer.
     */
    public function addProducer(Producer $producer) {
        $this->producers[] = $producer;
        return $this;
    }

    /**
     * Get the producers.
     *
     * @return Producer[] Returns the producers.
     */
    public function getProducers() {
        return $this->producers;
    }

    /**
     * Determines if this instance has producers.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasProducers() {
        return 1 <= count($this->producers);
    }

    /**
     * Set the producers.
     *
     * @param Producer[] $producers The producers.
     */
    protected function setProducers(array $producers) {
        $this->producers = $producers;
        return $this;
    }
}