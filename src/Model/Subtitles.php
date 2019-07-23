<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Model;

use WBW\Library\XMLTV\Traits\TypeTrait;

/**
 * Subtitles.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Subtitles extends AbstractModel {

    use TypeTrait;

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
     * Get the language.
     *
     * @param Language|null $language The language.
     * @return Subtitles Returns this subtitles.
     */
    public function setLanguage(Language $language = null) {
        $this->language = $language;
        return $this;
    }
}
