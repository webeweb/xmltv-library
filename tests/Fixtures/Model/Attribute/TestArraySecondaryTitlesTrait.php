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

use WBW\Library\XMLTV\Model\Attribute\ArraySecondaryTitlesTrait;

/**
 * Test array secondary titles trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute
 */
class TestArraySecondaryTitlesTrait {

    use ArraySecondaryTitlesTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setSecondaryTitles([]);
    }
}
