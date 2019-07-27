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

use WBW\Library\XMLTV\Model\Rating;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestRatingsTrait;

/**
 * Ratings trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class RatingsTraitTest extends AbstractTestCase {

    /**
     * Tests the addRating() method.
     *
     * @return void
     */
    public function testAddRating() {

        // Set a Rating mock.
        $rating = new Rating();

        $obj = new TestRatingsTrait();

        $obj->addRating($rating);
        $this->assertCount(1, $obj->getRatings());
        $this->assertSame($rating, $obj->getRatings()[0]);
        $this->assertTrue($obj->hasRatings());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestRatingsTrait();

        $this->assertEquals([], $obj->getRatings());
        $this->assertFalse($obj->hasRatings());
    }
}
