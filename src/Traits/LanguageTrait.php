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

use WBW\Library\XMLTV\Model\Language;

/**
 * Language trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait LanguageTrait {

    /**
     * Language.
     *
     * @var Language
     */
    private $language;

    /**
     * Get the language.
     *
     * @return Language Returns the language.
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * Set the language.
     *
     * @param Language|null $language The language.
     * @return LanguageTrait Returns this language trait.
     */
    public function setLanguage(Language $language = null) {
        $this->language = $language;
        return $this;
    }

}
