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

use WBW\Library\XmlTv\Model\Attribute\ArrayDescsTrait;

/**
 * Test array descriptions trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute
 */
class TestArrayDescsTrait {

    use ArrayDescsTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setDescs([]);
    }
}
