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

use WBW\Library\XMLTV\Model\Credits;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Credits test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class CreditsTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Credits();

        $this->assertEquals([], $obj->getActors());
        $this->assertEquals([], $obj->getAdapters());
        $this->assertEquals([], $obj->getCommentators());
        $this->assertEquals([], $obj->getComposers());
        $this->assertEquals([], $obj->getDirectors());
        $this->assertEquals([], $obj->getEditors());
        $this->assertEquals([], $obj->getGuests());
        $this->assertEquals([], $obj->getPresenters());
        $this->assertEquals([], $obj->getProducers());
        $this->assertEquals([], $obj->getWriters());
    }
}
