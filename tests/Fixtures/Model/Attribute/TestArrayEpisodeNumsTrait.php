<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute;

use WBW\Library\XMLTV\Model\Attribute\ArrayEpisodeNumsTrait;

/**
 * Test array episode numbers trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute
 */
class TestArrayEpisodeNumsTrait {

    use ArrayEpisodeNumsTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setEpisodeNums([]);
    }
}
