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

use WBW\Library\XMLTV\Model\EpisodeNum;

/**
 * Array episode numbers trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayEpisodeNumsTrait {

    /**
     * Episode numbers.
     *
     * @var EpisodeNum[]
     */
    private $episodeNums;

    /**
     * Add an episode number.
     *
     * @param EpisodeNum $episodeNum The episode number.
     */
    public function addEpisodeNum(EpisodeNum $episodeNum): self {
        $this->episodeNums[] = $episodeNum;
        return $this;
    }

    /**
     * Get the episode numbers.
     *
     * @return EpisodeNum[] Returns the episode numbers.
     */
    public function getEpisodeNums(): array {
        return $this->episodeNums;
    }

    /**
     * Get the number of episode nums.
     *
     * @return int Returns the number of episode nums.
     */
    public function getNumberEpisodeNums(): int {
        return count($this->getEpisodeNums());
    }

    /**
     * Determines if this instance has episode numbers.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasEpisodeNums(): bool {
        return 1 <= $this->getNumberEpisodeNums();
    }

    /**
     * Set the episode numbers.
     *
     * @param EpisodeNum[] $episodeNums The episode numbers.
     */
    protected function setEpisodeNums(array $episodeNums): self {
        $this->episodeNums = $episodeNums;
        return $this;
    }
}
