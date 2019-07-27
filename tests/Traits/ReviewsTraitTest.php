<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Traits;

use WBW\Library\XMLTV\Model\Review;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestReviewsTrait;

/**
 * Reviews trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class ReviewsTraitTest extends AbstractTestCase {

    /**
     * Tests the addReview() method.
     *
     * @return void
     */
    public function testAddReview() {

        // Set a Review mock.
        $review = new Review();

        $obj = new TestReviewsTrait();

        $obj->addReview($review);
        $this->assertCount(1, $obj->getReviews());
        $this->assertSame($review, $obj->getReviews()[0]);
        $this->assertTrue($obj->hasReviews());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestReviewsTrait();

        $this->assertEquals([], $obj->getReviews());
        $this->assertFalse($obj->hasReviews());
    }
}
