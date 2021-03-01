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

use WBW\Library\XMLTV\Model\Attribute\PresentPresentTrait;
use WBW\Library\XMLTV\Serializer\JsonSerializer;
use WBW\Library\XMLTV\Serializer\XmlSerializer;

/**
 * Audio.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Audio extends AbstractModel {

    use PresentPresentTrait;

    /**
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "audio";

    /**
     * Stereo.
     *
     * @var Stereo|null
     */
    private $stereo;

    /**
     * Get the stereo.
     *
     * @return Stereo|null Returns the stereo.
     */
    public function getStereo(): ?Stereo {
        return $this->stereo;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeAudio($this);
    }

    /**
     * Get the stereo.
     *
     * @param Stereo|null $stereo The stereo.
     * @return Audio Returns this audio.
     */
    public function setStereo(?Stereo $stereo): Audio {
        $this->stereo = $stereo;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeAudio($this);
    }
}
