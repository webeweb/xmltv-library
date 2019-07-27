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

use WBW\Library\XMLTV\Model\Keyword;

/**
 * Keywords trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait KeywordsTrait {

    /**
     * Keywords.
     *
     * @var Keyword[]
     */
    private $keywords;

    /**
     * Add an keyword.
     *
     * @param Keyword $keyword The keyword.
     * @return KeywordsTrait Returns this keywords trait.
     */
    public function addKeyword(Keyword $keyword) {
        $this->keywords[] = $keyword;
        return $this;
    }

    /**
     * Get the keywords.
     *
     * @return Keyword[] Returns the keywords.
     */
    public function getKeywords() {
        return $this->keywords;
    }

    /**
     * Determines if this instance has keywords.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasKeywords() {
        return 1 <= count($this->keywords);
    }

    /**
     * Set the keywords.
     *
     * @param Keyword[] $keywords The keywords.
     * @return KeywordsTrait Returns this keywords trait.
     */
    protected function setKeywords(array $keywords) {
        $this->keywords = $keywords;
        return $this;
    }
}