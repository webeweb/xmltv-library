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

use WBW\Library\XMLTV\Model\Audio;
use WBW\Library\XMLTV\Model\Credits;
use WBW\Library\XMLTV\Model\Date;
use WBW\Library\XMLTV\Model\LastChance;
use WBW\Library\XMLTV\Model\Length;
use WBW\Library\XMLTV\Model\Premiere;
use WBW\Library\XMLTV\Model\PreviouslyShown;
use WBW\Library\XMLTV\Model\Programme;
use WBW\Library\XMLTV\Model\Video;
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

        $this->assertNull($obj->getAudio());
        $this->assertEquals([], $obj->getCategories());
        $this->assertNull($obj->getChannel());
        $this->assertNull($obj->getClumpIdx());
        $this->assertEquals([], $obj->getCountries());
        $this->assertNull($obj->getCredits());
        $this->assertNull($obj->getDate());
        $this->assertEquals([], $obj->getDescs());
        $this->assertEquals([], $obj->getEpisodeNums());
        $this->assertEquals([], $obj->getIcons());
        $this->assertEquals([], $obj->getKeywords());
        $this->assertNull($obj->getLanguage());
        $this->assertNull($obj->getLastChance());
        $this->assertNull($obj->getLength());
        $this->assertNull($obj->getPremiere());
        $this->assertNull($obj->getPreviouslyShown());
        $this->assertNull($obj->getPdcStart());
        $this->assertEquals([], $obj->getRatings());
        $this->assertEquals([], $obj->getReviews());
        $this->assertEquals([], $obj->getStarRatings());
        $this->assertNull($obj->getShowView());
        $this->assertNull($obj->getStart());
        $this->assertNull($obj->getStop());
        $this->assertEquals([], $obj->getSubTitles());
        $this->assertEquals([], $obj->getTitles());
        $this->assertEquals([], $obj->getUrls());
        $this->assertNull($obj->getVideo());
        $this->assertNull($obj->getVideoPlus());
        $this->assertNull($obj->getVpsStart());
    }

    /**
     * Tests the setAudio() method.
     *
     * @return void
     */
    public function testSetAudio() {

        // Set an Audio mock.
        $audio = new Audio();

        $obj = new Programme();

        $obj->setAudio($audio);
        $this->assertSame($audio, $obj->getAudio());
    }

    /**
     * Tests the setClumpIdx() method.
     *
     * @return void
     */
    public function testSetClumpIdx() {

        $obj = new Programme();

        $obj->setClumpIdx(false);
        $this->assertFalse($obj->getClumpIdx());
    }

    /**
     * Tests the setCredits() method.
     *
     * @return void
     */
    public function testSetCredits() {

        // Set a Credits mock.
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

        // Set a Date mock.
        $date = new Date();

        $obj = new Programme();

        $obj->setDate($date);
        $this->assertSame($date, $obj->getDate());
    }

    /**
     * Tests the setLastChance() method.
     *
     * @return void
     */
    public function testSetLastChance() {

        // Set a Last chance mock.
        $lastChance = new LastChance();

        $obj = new Programme();

        $obj->setLastChance($lastChance);
        $this->assertSame($lastChance, $obj->getLastChance());
    }

    /**
     * Tests the setLength() method.
     *
     * @return void
     */
    public function testSetLength() {

        // Set a Length mock.
        $length = new Length();

        $obj = new Programme();

        $obj->setLength($length);
        $this->assertSame($length, $obj->getLength());
    }

    /**
     * Tests the setPdcStart() method.
     *
     * @return void
     */
    public function testSetPdcStart() {

        $obj = new Programme();

        $obj->setPdcStart("pdcStart");
        $this->assertEquals("pdcStart", $obj->getPdcStart());
    }

    /**
     * Tests the setPremiere() method.
     *
     * @return void
     */
    public function testSetPremiere() {

        // Set a Premiere mock.
        $premiere = new Premiere();

        $obj = new Programme();

        $obj->setPremiere($premiere);
        $this->assertSame($premiere, $obj->getPremiere());
    }

    /**
     * Tests the setPreviouslyShown() method.
     *
     * @return void
     */
    public function testSetPreviouslyShown() {

        // Set a Previously shown mock.
        $previouslyShown = new PreviouslyShown();

        $obj = new Programme();

        $obj->setPreviouslyShown($previouslyShown);
        $this->assertSame($previouslyShown, $obj->getPreviouslyShown());
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
     * Tests the setVideo() method.
     *
     * @return void
     */
    public function testSetVideo() {

        // Set a Video mock.
        $length = new Video();

        $obj = new Programme();

        $obj->setVideo($length);
        $this->assertSame($length, $obj->getVideo());
    }

    /**
     * Tests the setVideoPlus() method.
     *
     * @return void
     */
    public function testSetVideoPlus() {

        $obj = new Programme();

        $obj->setVideoPlus("videoPlus");
        $this->assertEquals("videoPlus", $obj->getVideoPlus());
    }

    /**
     * Tests the setVpsStart() method.
     *
     * @return void
     */
    public function testSetVpsStart() {

        $obj = new Programme();

        $obj->setVpsStart("vpsStart");
        $this->assertEquals("vpsStart", $obj->getVpsStart());
    }
}
