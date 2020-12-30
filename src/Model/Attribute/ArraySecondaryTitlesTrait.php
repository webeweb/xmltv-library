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

use WBW\Library\XMLTV\Model\SecondaryTitle;

/**
 * Array secondary titles trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArraySecondaryTitlesTrait {

    /**
     * Secondary titles.
     *
     * @var SecondaryTitle[]
     */
    private $secondaryTitles;

    /**
     * Add a secondary title.
     *
     * @param SecondaryTitle $secondaryTitle The secondary title.
     */
    public function addSecondaryTitle(SecondaryTitle $secondaryTitle): self {
        $this->secondaryTitles[] = $secondaryTitle;
        return $this;
    }

    /**
     * Get the number of secondary titles.
     *
     * @return int Returns the number of secondary titles.
     */
    public function getNumberSecondaryTitles(): int {
        return count($this->getSecondaryTitles());
    }

    /**
     * Get the secondary titles.
     *
     * @return SecondaryTitle[] Returns the secondary titles.
     */
    public function getSecondaryTitles(): array {
        return $this->secondaryTitles;
    }

    /**
     * Determines if this instance has secondary titles.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasSecondaryTitles(): bool {
        return 1 <= $this->getNumberSecondaryTitles();
    }

    /**
     * Set the secondary titles.
     *
     * @param SecondaryTitle[] $secondaryTitles The secondary titles.
     */
    protected function setSecondaryTitles(array $secondaryTitles): self {
        $this->secondaryTitles = $secondaryTitles;
        return $this;
    }
}
