<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Model;

use WBW\Library\XMLTV\Model\PreviouslyShown;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Previously shown test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class PreviouslyShownTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new PreviouslyShown();

        $this->assertNull($obj->getChannel());
        $this->assertNull($obj->getStart());
        $this->assertNull($obj->getStartDateTime());
    }
}
