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

use WBW\Library\XMLTV\Model\Desc;

/**
 * Array descriptions trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayDescsTrait {

    /**
     * Descriptions.
     *
     * @var Desc[]
     */
    private $descs;

    /**
     * Add a description.
     *
     * @param Desc $desc The description.
     */
    public function addDesc(Desc $desc) {
        $this->descs[] = $desc;
        return $this;
    }

    /**
     * Get the descriptions.
     *
     * @return Desc[] Returns the descriptions.
     */
    public function getDescs() {
        return $this->descs;
    }

    /**
     * Get the number of descriptions.
     *
     * @return int Returns the number of descriptions.
     */
    public function getNumberDescs() {
        return count($this->getDescs());
    }

    /**
     * Determines if this instance has descriptions.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasDescs() {
        return 1 <= $this->getNumberDescs();
    }

    /**
     * Set the descriptions.
     *
     * @param Desc[] $descs The descriptions.
     */
    protected function setDescs(array $descs) {
        $this->descs = $descs;
        return $this;
    }
}
