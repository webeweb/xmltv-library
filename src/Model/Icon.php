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
 * Icon.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Icon extends AbstractModel {

    /**
     * Height.
     *
     * @var int
     */
    private $height;

    /**
     * Source.
     *
     * @var string
     */
    private $src;

    /**
     * Width.
     *
     * @var int
     */
    private $width;

    /**
     * Get the height.
     *
     * @return int Returns the height.
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * Get the source.
     *
     * @return string Returns the source.
     */
    public function getSrc() {
        return $this->src;
    }

    /**
     * Get the width.
     *
     * @return int Returns the width.
     */
    public function getWidth() {
        return $this->width;
    }

    /**
     * Set the height.
     *
     * @param int $height The height.
     * @return Icon Returns this icon.
     */
    public function setHeight($height) {
        $this->height = $height;
        return $this;
    }

    /**
     * Set the source.
     *
     * @param string $src The source.
     * @return Icon Returns this icon.
     */
    public function setSrc($src) {
        $this->src = $src;
        return $this;
    }

    /**
     * Set the width.
     *
     * @param int $width The width.
     * @return Icon Returns this icon.
     */
    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }
}
