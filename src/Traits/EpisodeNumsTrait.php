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

use WBW\Library\XMLTV\Model\EpisodeNum;

/**
 * Episode numbers trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait EpisodeNumsTrait {

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
     * @return EpisodeNumsTrait Returns this episode numbers trait.
     */
    public function addEpisodeNum(EpisodeNum $episodeNum) {
        $this->episodeNums[] = $episodeNum;
        return $this;
    }

    /**
     * Get the episode numbers.
     *
     * @return EpisodeNum[] Returns the episode numbers.
     */
    public function getEpisodeNums() {
        return $this->episodeNums;
    }

    /**
     * Determines if this instance has episode numbers.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasEpisodeNums() {
        return 1 <= count($this->episodeNums);
    }

    /**
     * Set the episode numbers.
     *
     * @param EpisodeNum[] $episodeNums The episode numbers.
     * @return EpisodeNumsTrait Returns this episode numbers trait.
     */
    protected function setEpisodeNums(array $episodeNums) {
        $this->episodeNums = $episodeNums;
        return $this;
    }
}
