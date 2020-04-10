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

use WBW\Library\XMLTV\Model\Rating;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayRatingsTrait;

/**
 * Array ratings trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayRatingsTraitTest extends AbstractTestCase {

    /**
     * Tests the addRating() method.
     *
     * @return void
     */
    public function testAddRating() {

        // Set a Rating mock.
        $rating = new Rating();

        $obj = new TestArrayRatingsTrait();

        $obj->addRating($rating);
        $this->assertSame($rating, $obj->getRatings()[0]);
        $this->assertEquals(1, $obj->getNumberRatings());
        $this->assertTrue($obj->hasRatings());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestArrayRatingsTrait();

        $this->assertEquals([], $obj->getRatings());
        $this->assertEquals(0, $obj->getNumberRatings());
        $this->assertFalse($obj->hasRatings());
    }
}
