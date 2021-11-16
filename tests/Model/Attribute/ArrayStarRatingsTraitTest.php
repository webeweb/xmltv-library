<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Model\Attribute;

use WBW\Library\XmlTv\Model\StarRating;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestArrayStarRatingsTrait;

/**
 * Array star ratings trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class ArrayStarRatingsTraitTest extends AbstractTestCase {

    /**
     * Tests the addStarRating() method.
     *
     * @return void
     */
    public function testAddStarRating(): void {

        // Set a Star rating mock.
        $starRating = new StarRating();

        $obj = new TestArrayStarRatingsTrait();

        $obj->addStarRating($starRating);
        $this->assertSame($starRating, $obj->getStarRatings()[0]);
        $this->assertEquals(1, $obj->getNumberStarRatings());
        $this->assertTrue($obj->hasStarRatings());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayStarRatingsTrait();

        $this->assertEquals([], $obj->getStarRatings());
        $this->assertEquals(0, $obj->getNumberStarRatings());
        $this->assertFalse($obj->hasStarRatings());
    }
}
