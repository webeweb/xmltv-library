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

use WBW\Library\XMLTV\Model\StarRating;
use WBW\Library\XMLTV\Model\Value;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Star rating test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class StarRatingTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new StarRating();

        $this->assertNull($obj->getValue());
    }

    /**
     * Tests the setValue() method.
     *
     * @return void
     */
    public function testSetValue() {

        // Set an Value mock.
        $aspect = new Value();

        $obj = new StarRating();

        $obj->setValue($aspect);
        $this->assertSame($aspect, $obj->getValue());
    }
}
