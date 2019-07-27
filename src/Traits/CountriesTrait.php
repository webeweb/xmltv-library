<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Traits;

use WBW\Library\XMLTV\Model\Country;

/**
 * Countries trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait CountriesTrait {

    /**
     * Countries.
     *
     * @var Country[]
     */
    private $countries;

    /**
     * Add a country.
     *
     * @param Country $country The country.
     * @return CountriesTrait Returns this countries trait.
     */
    public function addCountry(Country $country) {
        $this->countries[] = $country;
        return $this;
    }

    /**
     * Get the countries.
     *
     * @return Country[] Returns the countries.
     */
    public function getCountries() {
        return $this->countries;
    }

    /**
     * Determines if this programme has countries.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasCountries() {
        return 1 <= count($this->countries);
    }

    /**
     * Set the countries.
     *
     * @param Country[] $countries The countries.
     * @return CountriesTrait Returns this countries trait.
     */
    protected function setCountries(array $countries) {
        $this->countries = $countries;
        return $this;
    }
}
