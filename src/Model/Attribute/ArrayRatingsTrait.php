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

use WBW\Library\XMLTV\Model\Rating;

/**
 * Array ratings trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayRatingsTrait {

    /**
     * Ratings.
     *
     * @var Rating[]
     */
    private $ratings;

    /**
     * Add a rating.
     *
     * @param Rating $rating The rating.
     */
    public function addRating(Rating $rating) {
        $this->ratings[] = $rating;
        return $this;
    }

    /**
     * Get the ratings.
     *
     * @return Rating[] Returns the ratings.
     */
    public function getRatings() {
        return $this->ratings;
    }

    /**
     * Determines if this instance has ratings.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasRatings() {
        return 1 <= count($this->ratings);
    }

    /**
     * Set the ratings.
     *
     * @param Rating[] $ratings The ratings.
     */
    protected function setRatings(array $ratings) {
        $this->ratings = $ratings;
        return $this;
    }
}