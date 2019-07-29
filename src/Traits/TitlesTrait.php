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

use WBW\Library\XMLTV\Model\Title;

/**
 * Titles trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait TitlesTrait {

    /**
     * Titles.
     *
     * @var Title[]
     */
    private $titles;

    /**
     * Add a title.
     *
     * @param Title $title The title.
     */
    public function addTitle(Title $title) {
        $this->titles[] = $title;
        return $this;
    }

    /**
     * Get the titles.
     *
     * @return Title[] Returns the titles.
     */
    public function getTitles() {
        return $this->titles;
    }

    /**
     * Determines if this instance has titles.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasTitles() {
        return 1 <= count($this->titles);
    }

    /**
     * Set the titles.
     *
     * @param Title[] $titles The titles.
     */
    protected function setTitles(array $titles) {
        $this->titles = $titles;
        return $this;
    }
}
