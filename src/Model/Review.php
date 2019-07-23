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

use WBW\Library\XMLTV\Traits\LangTrait;
use WBW\Library\XMLTV\Traits\TypeTrait;

/**
 * Review.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Review extends AbstractModel {

    use LangTrait;
    use TypeTrait;

    /**
     * Reviewer.
     *
     * @var string
     */
    private $reviewer;

    /**
     * Source.
     *
     * @var string
     */
    private $source;

    /**
     * Get the reviewer.
     *
     * @return string Returns the reviewer.
     */
    public function getReviewer() {
        return $this->reviewer;
    }

    /**
     * Get the source.
     *
     * @return string Returns the source.
     */
    public function getSource() {
        return $this->source;
    }

    /**
     * Set the reviewer.
     *
     * @param string $reviewer The reviewer.
     * @return Review Returns this review.
     */
    public function setReviewer($reviewer) {
        $this->reviewer = $reviewer;
        return $this;
    }

    /**
     * Set the source.
     *
     * @param string $source The source.
     * @return Review Returns this review.
     */
    public function setSource($source) {
        $this->source = $source;
        return $this;
    }

}
