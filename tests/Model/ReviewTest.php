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

use WBW\Library\XMLTV\Model\Review;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Review test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class ReviewTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Review();

        $this->assertNull($obj->getLang());
        $this->assertNull($obj->getReviewer());
        $this->assertNull($obj->getSource());
        $this->assertNull($obj->getType());
    }

    /**
     * Tests the setReviewer() method.
     *
     * @return void
     */
    public function testSetReviewer() {

        $obj = new Review();

        $obj->setReviewer("reviewer");
        $this->assertEquals("reviewer", $obj->getReviewer());
    }

    /**
     * Tests the setSource() method.
     *
     * @return void
     */
    public function testSetSource() {

        $obj = new Review();

        $obj->setSource("source");
        $this->assertEquals("source", $obj->getSource());
    }
}
