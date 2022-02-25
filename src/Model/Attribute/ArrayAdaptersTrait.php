<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Model\Attribute;

use WBW\Library\XmlTv\Model\Adapter;

/**
 * Array adapters trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Model\Attribute
 */
trait ArrayAdaptersTrait {

    /**
     * Adapters.
     *
     * @var Adapter[]
     */
    protected $adapters;

    /**
     * Add an adapter.
     *
     * @param Adapter $adapter The adapter.
     * @return self Returns this instance.
     */
    public function addAdapter(Adapter $adapter): self {
        $this->adapters[] = $adapter;
        return $this;
    }

    /**
     * Get the adapters.
     *
     * @return Adapter[] Returns the adapters.
     */
    public function getAdapters(): array {
        return $this->adapters;
    }

    /**
     * Get the number of adapters.
     *
     * @return int Returns the number of adapters.
     */
    public function getNumberAdapters(): int {
        return count($this->getAdapters());
    }

    /**
     * Determines if this instance has adapters.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasAdapters(): bool {
        return 1 <= $this->getNumberAdapters();
    }

    /**
     * Set the adapters.
     *
     * @param Adapter[] $adapters The adapters.
     * @return self Returns this instance.
     */
    protected function setAdapters(array $adapters): self {
        $this->adapters = $adapters;
        return $this;
    }
}
