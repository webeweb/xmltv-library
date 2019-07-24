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

use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Model\Url;

/**
 * URLs trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait UrlsTrait {

    /**
     * URLs.
     *
     * @var Url[]
     */
    private $urls;


    /**
     * Add an URL.
     *
     * @param Url $url The URL.
     */
    public function addUrl(Url $url) {
        $this->urls[] = $url;
        return $this;
    }


    /**
     * Determines if this instance has URLs.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasURLs() {
        return 1 <= count($this->urls);
    }

    /**
     * Get the urls.
     *
     * @return Url[] Returns the urls.
     */
    public function getUrls() {
        return $this->urls;
    }


    /**
     * Set the URLs.
     *
     * @param Url[] $urls The URLs.
     */
    protected function setUrls(array $urls) {
        $this->urls = $urls;
        return $this;
    }
}
