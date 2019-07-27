<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Fixtures\Traits;

use WBW\Library\XMLTV\Traits\DirectorsTrait;

/**
 * Test directors trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Fixtures\Traits
 */
class TestDirectorsTrait {

    use DirectorsTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setDirectors([]);
    }
}
