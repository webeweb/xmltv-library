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

use WBW\Library\XMLTV\Model\Country;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayCountriesTrait;

/**
 * Array countries trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayCountriesTraitTest extends AbstractTestCase {

    /**
     * Tests the addCountry() method.
     *
     * @return void
     */
    public function testAddCountry(): void {

        // Set a Country mock.
        $country = new Country();

        $obj = new TestArrayCountriesTrait();

        $obj->addCountry($country);
        $this->assertSame($country, $obj->getCountries()[0]);
        $this->assertEquals(1, $obj->getNumberCountries());
        $this->assertTrue($obj->hasCountries());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayCountriesTrait();

        $this->assertEquals([], $obj->getCountries());
        $this->assertEquals(0, $obj->getNumberCountries());
        $this->assertFalse($obj->hasCountries());
    }
}
