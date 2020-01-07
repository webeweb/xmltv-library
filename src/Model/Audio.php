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

/**
 * Audio.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Audio extends AbstractModel {

    use PresentTrait;

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
     * Get the stereo.
     *
     * @param Stereo|null $stereo The stereo.
     * @return Audio Returns this audio.
     */
    public function setStereo(Stereo $stereo = null) {
        $this->stereo = $stereo;
        return $this;
    }
}
