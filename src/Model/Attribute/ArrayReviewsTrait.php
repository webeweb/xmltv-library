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

use WBW\Library\XMLTV\Model\Review;

/**
 * Array reviews trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayReviewsTrait {

    /**
     * Reviews.
     *
     * @var Review[]
     */
    private $reviews;

    /**
     * Add a review.
     *
     * @param Review $review The review.
     */
    public function addReview(Review $review) {
        $this->reviews[] = $review;
        return $this;
    }

    /**
     * Get the number of reviews.
     *
     * @return int Returns the number of reviews.
     */
    public function getNumberReviews() {
        return count($this->getReviews());
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
        return 1 <= $this->getNumberReviews();
    }

    /**
     * Set the reviews.
     *
     * @param Review[] $reviews The reviews.
     */
    protected function setReviews(array $reviews) {
        $this->reviews = $reviews;
        return $this;
    }
}
