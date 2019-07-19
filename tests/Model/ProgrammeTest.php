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

use WBW\Library\XMLTV\Model\Category;
use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Model\Country;
use WBW\Library\XMLTV\Model\Credits;
use WBW\Library\XMLTV\Model\Date;
use WBW\Library\XMLTV\Model\Icon;
use WBW\Library\XMLTV\Model\Length;
use WBW\Library\XMLTV\Model\Programme;
use WBW\Library\XMLTV\Model\Rating;
use WBW\Library\XMLTV\Model\Title;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Programme test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class ProgrammeTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Programme();

        $this->assertNull($obj->getCategory());
        $this->assertNull($obj->getChannel());
        $this->assertNull($obj->getCountry());
        $this->assertNull($obj->getCredits());
        $this->assertNull($obj->getDate());
        $this->assertNull($obj->getIcon());
        $this->assertNull($obj->getLength());
        $this->assertNull($obj->getRating());
        $this->assertNull($obj->getShowView());
        $this->assertNull($obj->getStart());
        $this->assertNull($obj->getStop());
        $this->assertNull($obj->getTitle());
    }

    /**
     * Tests the setCategory() method.
     *
     * @return void
     */
    public function testSetCategory() {

        // Set an Category mock.
        $category = new Category();

        $obj = new Programme();

        $obj->setCategory($category);
        $this->assertSame($category, $obj->getCategory());
    }

    /**
     * Tests the setChannel() method.
     *
     * @return void
     */
    public function testSetChannel() {

        // Set an Channel mock.
        $channel = new Channel();

        $obj = new Programme();

        $obj->setChannel($channel);
        $this->assertSame($channel, $obj->getChannel());
    }

    /**
     * Tests the setCountry() method.
     *
     * @return void
     */
    public function testSetCountry() {

        // Set an Country mock.
        $country = new Country();

        $obj = new Programme();

        $obj->setCountry($country);
        $this->assertSame($country, $obj->getCountry());
    }

    /**
     * Tests the setCredits() method.
     *
     * @return void
     */
    public function testSetCredits() {

        // Set an Credits mock.
        $credits = new Credits();

        $obj = new Programme();

        $obj->setCredits($credits);
        $this->assertSame($credits, $obj->getCredits());
    }

    /**
     * Tests the setDate() method.
     *
     * @return void
     */
    public function testSetDate() {

        // Set an Date mock.
        $date = new Date();

        $obj = new Programme();

        $obj->setDate($date);
        $this->assertSame($date, $obj->getDate());
    }

    /**
     * Tests the setIcon() method.
     *
     * @return void
     */
    public function testSetIcon() {

        // Set an Icon mock.
        $aspect = new Icon();

        $obj = new Programme();

        $obj->setIcon($aspect);
        $this->assertSame($aspect, $obj->getIcon());
    }

    /**
     * Tests the setLength() method.
     *
     * @return void
     */
    public function testSetLength() {

        // Set an Length mock.
        $length = new Length();

        $obj = new Programme();

        $obj->setLength($length);
        $this->assertSame($length, $obj->getLength());
    }

    /**
     * Tests the setRating() method.
     *
     * @return void
     */
    public function testSetRating() {

        // Set an Rating mock.
        $rating = new Rating();

        $obj = new Programme();

        $obj->setRating($rating);
        $this->assertSame($rating, $obj->getRating());
    }

    /**
     * Tests the setShowView() method.
     *
     * @return void
     */
    public function testSetShowView() {

        $obj = new Programme();

        $obj->setShowView("showView");
        $this->assertEquals("showView", $obj->getShowView());
    }

    /**
     * Tests the setStart() method.
     *
     * @return void
     */
    public function testSetStart() {

        $obj = new Programme();

        $obj->setStart("start");
        $this->assertEquals("start", $obj->getStart());
    }

    /**
     * Tests the setStop() method.
     *
     * @return void
     */
    public function testSetStop() {

        $obj = new Programme();

        $obj->setStop("stop");
        $this->assertEquals("stop", $obj->getStop());
    }

    /**
     * Tests the setTitle() method.
     *
     * @return void
     */
    public function testSetTitle() {

        // Set an Title mock.
        $title = new Title();

        $obj = new Programme();

        $obj->setTitle($title);
        $this->assertSame($title, $obj->getTitle());
    }
}
