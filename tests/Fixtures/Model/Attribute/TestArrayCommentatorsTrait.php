<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute;

use WBW\Library\XmlTv\Model\Attribute\ArrayCommentatorsTrait;

/**
 * Test array commentators trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute
 */
class TestArrayCommentatorsTrait {

    use ArrayCommentatorsTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setCommentators([]);
    }
}
