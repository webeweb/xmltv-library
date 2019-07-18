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

/**
 * Category.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Category extends AbstractModel {

    /**
     * Lang.
     *
     * @var string
     */
    private $lang;

    /**
     * Get the content.
     *
     * @return string Returns the content.
     */
    public function getContent() {
        return parent::getContent();
    }

    /**
     * Get the lang.
     *
     * @return string Returns the lang.
     */
    public function getLang() {
        return $this->lang;
    }

    /**
     * Set the content.
     *
     * @param string $content The content.
     * @return Category Returns this category.
     */
    public function setContent($content) {
        return parent::setContent($content);
    }

    /**
     * Set the lang.
     *
     * @param string $lang The lang.
     * @return Category Returns this category.
     */
    public function setLang($lang) {
        $this->lang = $lang;
        return $this;
    }
}
