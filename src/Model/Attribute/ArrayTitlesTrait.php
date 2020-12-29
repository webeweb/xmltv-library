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

use WBW\Library\XMLTV\Model\Title;

/**
 * Array titles trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayTitlesTrait {

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
     * Get the number of titles.
     *
     * @return int Returns the number of titles.
     */
    public function getNumberTitles(): int {
        return count($this->getTitles());
    }

    /**
     * Get the titles.
     *
     * @return Title[] Returns the titles.
     */
    public function getTitles(): array {
        return $this->titles;
    }

    /**
     * Determines if this instance has titles.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasTitles(): bool {
        return 1 <= $this->getNumberTitles();
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
