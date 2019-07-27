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

use WBW\Library\XMLTV\Model\StarRating;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestStarRatingsTrait;

/**
 * Star ratings trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class StarRatingsTraitTest extends AbstractTestCase {

    /**
     * Tests the addStarRating() method.
     *
     * @return void
     */
    public function testAddStarRating() {

        // Set a Star rating mock.
        $starRating = new StarRating();

        $obj = new TestStarRatingsTrait();

        $obj->addStarRating($starRating);
        $this->assertCount(1, $obj->getStarRatings());
        $this->assertSame($starRating, $obj->getStarRatings()[0]);
        $this->assertTrue($obj->hasStarRatings());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestStarRatingsTrait();

        $this->assertEquals([], $obj->getStarRatings());
        $this->assertFalse($obj->hasStarRatings());
    }
}
