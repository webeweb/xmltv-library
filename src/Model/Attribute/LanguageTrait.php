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

use WBW\Library\XMLTV\Model\Language;

/**
 * Language trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait LanguageTrait {

    /**
     * Language.
     *
     * @var Language|null
     */
    protected $language;

    /**
     * Get the language.
     *
     * @return Language|null Returns the language.
     */
    public function getLanguage(): ?Language {
        return $this->language;
    }

    /**
     * Set the language.
     *
     * @param Language|null $language The language.
     * @return self Returns this instance.
     */
    public function setLanguage(?Language $language): self {
        $this->language = $language;
        return $this;
    }
}
