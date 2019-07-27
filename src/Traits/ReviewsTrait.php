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

use WBW\Library\XMLTV\Model\Review;

/**
 * Reviews trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait ReviewsTrait {

    /**
     * Reviews.
     *
     * @var Review[]
     */
    private $reviews;

    /**
     * Add an review.
     *
     * @param Review $review The review.
     * @return ReviewsTrait Returns this reviews trait.
     */
    public function addReview(Review $review) {
        $this->reviews[] = $review;
        return $this;
    }

    /**
     * Get the reviews.
     *
     * @return Review[] Returns the reviews.
     */
    public function getReviews() {
        return $this->reviews;
    }

    /**
     * Determines if this instance has reviews.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasReviews() {
        return 1 <= count($this->reviews);
    }

    /**
     * Set the reviews.
     *
     * @param Review[] $reviews The reviews.
     * @return ReviewsTrait Returns this reviews trait.
     */
    protected function setReviews(array $reviews) {
        $this->reviews = $reviews;
        return $this;
    }
}
