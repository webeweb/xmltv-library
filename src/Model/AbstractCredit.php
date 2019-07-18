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
 * Abstract credit.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 * @abstract
 */
abstract class AbstractCredit extends AbstractModel {

    /**
     * Get the content.
     *
     * @return string Returns the content.
     */
    public function getContent() {
        return parent::getContent();
    }

    /**
     * Set the content.
     *
     * @param string $content The content.
     * @return AbstractCredit Returns this credit.
     */
    public function setContent($content) {
        return parent::setContent($content);
    }
}
