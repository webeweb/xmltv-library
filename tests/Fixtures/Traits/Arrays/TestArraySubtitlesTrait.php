<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Fixtures\Traits\Arrays;

use WBW\Library\XmlTv\Traits\Arrays\ArraySubtitlesTrait;

/**
 * Test array subtitles trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Fixtures\Traits\Arrays
 */
class TestArraySubtitlesTrait {

    use ArraySubtitlesTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setSubtitles([]);
    }
}
