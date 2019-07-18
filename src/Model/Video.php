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
 * Video.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Video extends AbstractModel {

    /**
     * Aspect.
     *
     * @var Aspect
     */
    private $aspect;

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
     * Get the quality.
     *
     * @return Quality Returns the quality.
     */
    public function getQuality() {
        return $this->quality;
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
     * Set the quality.
     *
     * @param Quality|null $quality The quality.
     * @return Video Returns this video.
     */
    public function setQuality(Quality $quality = null) {
        $this->quality = $quality;
        return $this;
    }
}
