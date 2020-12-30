<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Model\Attribute;

use WBW\Library\XMLTV\Model\Country;

/**
 * Array countries trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayCountriesTrait {

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
     */
    public function addCountry(Country $country): self {
        $this->countries[] = $country;
        return $this;
    }

    /**
     * Get the countries.
     *
     * @return Country[] Returns the countries.
     */
    public function getCountries(): array {
        return $this->countries;
    }

    /**
     * Get the number of countries.
     *
     * @return int Returns the number of countries.
     */
    public function getNumberCountries(): int {
        return count($this->getCountries());
    }

    /**
     * Determines if this programme has countries.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasCountries(): bool {
        return 1 <= $this->getNumberCountries();
    }

    /**
     * Set the countries.
     *
     * @param Country[] $countries The countries.
     */
    protected function setCountries(array $countries): self {
        $this->countries = $countries;
        return $this;
    }
}
