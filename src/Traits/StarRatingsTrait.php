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

use WBW\Library\XMLTV\Model\StarRating;

/**
 * Star tatings trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait StarRatingsTrait {

    /**
     * Star ratings.
     *
     * @var StarRating[]
     */
    private $starRatings;

    /**
     * Add an star rating.
     *
     * @param StarRating $starRating The star rating.
     */
    public function addStarRating(StarRating $starRating) {
        $this->starRatings[] = $starRating;
        return $this;
    }

    /**
     * Get the star ratings.
     *
     * @return StarRating[] Returns the star ratings.
     */
    public function getStarRatings() {
        return $this->starRatings;
    }

    /**
     * Determines if this instance has star ratings.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasStarRatings() {
        return 1 <= count($this->starRatings);
    }

    /**
     * Set the star ratings.
     *
     * @param StarRating[] $starRatings The star ratings.
     */
    protected function setStarRatings(array $starRatings) {
        $this->starRatings = $starRatings;
        return $this;
    }
}
