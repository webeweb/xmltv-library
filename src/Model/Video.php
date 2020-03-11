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

use WBW\Library\XMLTV\Model\Attribute\PresentTrait;
use WBW\Library\XMLTV\Serializer\JsonSerializer;
use WBW\Library\XMLTV\Serializer\XmlSerializer;

/**
 * Video.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Video extends AbstractModel {

    use PresentTrait;

    /**
     * Aspect.
     *
     * @var Aspect
     */
    private $aspect;

    /**
     * Colour.
     *
     * @var Colour
     */
    private $colour;

    /**
     * Quality.
     *
     * @var Quality
     */
    private $quality;

    /**
     * Get the aspect.
     *
     * @return Aspect Returns the aspect.
     */
    public function getAspect() {
        return $this->aspect;
    }

    /**
     * Get the colour.
     *
     * @return Colour Returns the colour.
     */
    public function getColour() {
        return $this->colour;
    }

    /**
     * Get the quality.
     *
     * @return Quality Returns the quality.
     */
    public function getQuality() {
        return $this->quality;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return JsonSerializer::serializeVideo($this);
    }

    /**
     * Set the aspect.
     *
     * @param Aspect|null $aspect The aspect.
     * @return Video Returns this video.
     */
    public function setAspect(Aspect $aspect = null) {
        $this->aspect = $aspect;
        return $this;
    }

    /**
     * Set the colour.
     *
     * @param Colour|null $colour The colour.
     * @return Video Returns this video.
     */
    public function setColour(Colour $colour = null) {
        $this->colour = $colour;
        return $this;
    }

    /**
     * Set the quality.
     *
     * @param Quality|null $quality The quality.
     * @return Video Returns this video.
     */
    public function setQuality(Quality $quality = null) {
        $this->quality = $quality;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize() {
        return XmlSerializer::serializeVideo($this);
    }
}
