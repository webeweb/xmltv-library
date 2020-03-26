<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Model\Attribute;

use WBW\Library\XMLTV\Model\Subtitles;

/**
 * Array subtitles trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArraySubtitlesTrait {

    /**
     * Subtitles.
     *
     * @var Subtitles[]
     */
    private $subtitles;

    /**
     * Add a subtitles.
     *
     * @param Subtitles $subtitles The subtitles.
     */
    public function addSubtitles(Subtitles $subtitles) {
        $this->subtitles[] = $subtitles;
        return $this;
    }

    /**
     * Get the number of subtitles.
     *
     * @return int Returns the number of subtitles.
     */
    public function getNumberSubtitles() {
        return count($this->getSubtitles());
    }

    /**
     * Get the subtitles.
     *
     * @return Subtitles[] Returns the subtitles.
     */
    public function getSubtitles() {
        return $this->subtitles;
    }

    /**
     * Determines if this instance has subtitles.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasSubtitles() {
        return 1 <= $this->getNumberSubtitles();
    }

    /**
     * Set the subtitles.
     *
     * @param Subtitles[] $subtitles The subtitles.
     */
    protected function setSubtitles(array $subtitles) {
        $this->subtitles = $subtitles;
        return $this;
    }
}
