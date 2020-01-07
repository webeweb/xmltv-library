<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Model\Attribute;

use WBW\Library\XMLTV\Model\Review;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayReviewsTrait;

/**
 * Array reviews trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayReviewsTraitTest extends AbstractTestCase {

    /**
     * Tests the addReview() method.
     *
     * @return void
     */
    public function testAddReview() {

        // Set a Review mock.
        $review = new Review();

        $obj = new TestArrayReviewsTrait();

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

        $obj = new TestArrayReviewsTrait();

        $this->assertEquals([], $obj->getReviews());
        $this->assertFalse($obj->hasReviews());
    }
}
