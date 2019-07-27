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

use WBW\Library\XMLTV\Model\Country;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestCountriesTrait;

/**
 * Countries trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class CountriesTraitTest extends AbstractTestCase {

    /**
     * Tests the addCountry() method.
     *
     * @return void
     */
    public function testAddCountry() {

        // Set a Country mock.
        $country = new Country();

        $obj = new TestCountriesTrait();

        $obj->addCountry($country);
        $this->assertCount(1, $obj->getCountries());
        $this->assertSame($country, $obj->getCountries()[0]);
        $this->assertTrue($obj->hasCountries());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestCountriesTrait();

        $this->assertEquals([], $obj->getCountries());
        $this->assertFalse($obj->hasCountries());
    }
}
