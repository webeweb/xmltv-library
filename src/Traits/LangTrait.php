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

/**
 * Lang trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait LangTrait {

    /**
     * Lang.
     *
     * @var string
     */
    private $lang;

    /**
     * Get the lang.
     *
     * @return string Returns the lang.
     */
    public function getLang() {
        return $this->lang;
    }

    /**
     * Set the lang.
     *
     * @param string $lang The lang.
     * @return LangTrait Returns this lang trait.
     */
    public function setLang($lang) {
        $this->lang = $lang;
        return $this;
    }
}
