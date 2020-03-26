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

use WBW\Library\XMLTV\Model\Adapter;

/**
 * Array adapters trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayAdaptersTrait {

    /**
     * Adapters.
     *
     * @var Adapter[]
     */
    private $adapters;

    /**
     * Add an adapter.
     *
     * @param Adapter $adapter The adapter.
     */
    public function addAdapter(Adapter $adapter) {
        $this->adapters[] = $adapter;
        return $this;
    }

    /**
     * Get the adapters.
     *
     * @return Adapter[] Returns the adapters.
     */
    public function getAdapters() {
        return $this->adapters;
    }

    /**
     * Get the number of adapters.
     *
     * @return int Returns the number of adapters.
     */
    public function getNumberAdapters() {
        return count($this->getAdapters());
    }

    /**
     * Determines if this instance has adapters.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasAdapters() {
        return 1 <= $this->getNumberAdapters();
    }

    /**
     * Set the adapters.
     *
     * @param Adapter[] $adapters The adapters.
     */
    protected function setAdapters(array $adapters) {
        $this->adapters = $adapters;
        return $this;
    }
}
