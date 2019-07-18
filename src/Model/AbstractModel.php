<?php

/*
 * Disclaimer: This source code is protected by copyright law and by
 * international conventions.
 *
 * Any reproduction or partial or total distribution of the source code, by any
 * means whatsoever, is strictly forbidden.
 *
 * Anyone not complying with these provisions will be guilty of the offense of
 * infringement and the penal sanctions provided for by law.
 *
 * (c) 2019 All rights reserved.
 */

namespace WBW\Library\XMLTV\Model;

/**
 * Abstract node.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 * @abstract
 */
abstract class AbstractModel {

    /**
     * Content.
     *
     * @var mixed
     */
    private $content;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the content.
     *
     * @return mixed Returns the content.
     */
    protected function getContent() {
        return $this->content;
    }

    /**
     * Set the content.
     *
     * @param mixed $content The content.
     * @return AbstractModel Returns this model.
     */
    protected function setContent($content) {
        $this->content = $content;
        return $this;
    }
}
