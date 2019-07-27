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

use WBW\Library\XMLTV\Model\Adapter;

/**
 * Adapters trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait AdaptersTrait {

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
     * @return AdaptersTrait Returns this adapters trait.
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
     * Determines if this instance has adapters.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasAdapters() {
        return 1 <= count($this->adapters);
    }

    /**
     * Set the adapters.
     *
     * @param Adapter[] $adapters The adapters.
     * @return AdaptersTrait Returns this adapters trait.
     */
    protected function setAdapters(array $adapters) {
        $this->adapters = $adapters;
        return $this;
    }
}
