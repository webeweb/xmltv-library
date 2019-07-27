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

use WBW\Library\XMLTV\Model\SubTitle;

/**
 * Sub-titles trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait SubTitlesTrait {

    /**
     * Sub-titles.
     *
     * @var SubTitle[]
     */
    private $subTitles;

    /**
     * Add an sub-title.
     *
     * @param SubTitle $subTitle The sub-title.
     */
    public function addSubTitle(SubTitle $subTitle) {
        $this->subTitles[] = $subTitle;
        return $this;
    }

    /**
     * Get the sub-titles.
     *
     * @return SubTitle[] Returns the sub-titles.
     */
    public function getSubTitles() {
        return $this->subTitles;
    }

    /**
     * Determines if this instance has sub-titles.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasSubTitles() {
        return 1 <= count($this->subTitles);
    }

    /**
     * Set the sub-titles.
     *
     * @param SubTitle[] $subTitles The sub-titles.
     */
    protected function setSubTitles(array $subTitles) {
        $this->subTitles = $subTitles;
        return $this;
    }
}
