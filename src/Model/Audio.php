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
 * Audio.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Audio extends AbstractModel {

    use PresentTrait;

    /**
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "audio";

    /**
     * Stereo.
     *
     * @var Stereo
     */
    private $stereo;

    /**
     * Get the stereo.
     *
     * @return Stereo Returns the stereo.
     */
    public function getStereo() {
        return $this->stereo;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return JsonSerializer::serializeAudio($this);
    }

    /**
     * Get the stereo.
     *
     * @param Stereo|null $stereo The stereo.
     * @return Audio Returns this audio.
     */
    public function setStereo(Stereo $stereo = null) {
        $this->stereo = $stereo;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize() {
        return XmlSerializer::serializeAudio($this);
    }
}
