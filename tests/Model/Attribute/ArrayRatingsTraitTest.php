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

use WBW\Library\XmlTv\Model\Rating;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestArrayRatingsTrait;

/**
 * Array ratings trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class ArrayRatingsTraitTest extends AbstractTestCase {

    /**
     * Tests addRating()
     *
     * @return void
     */
    public function testAddRating(): void {

        // Set a Rating mock.
        $rating = new Rating();

        $obj = new TestArrayRatingsTrait();

        $obj->addRating($rating);
        $this->assertSame($rating, $obj->getRatings()[0]);
        $this->assertEquals(1, $obj->getNumberRatings());
        $this->assertTrue($obj->hasRatings());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayRatingsTrait();

        $this->assertEquals([], $obj->getRatings());
        $this->assertEquals(0, $obj->getNumberRatings());
        $this->assertFalse($obj->hasRatings());
    }
}
