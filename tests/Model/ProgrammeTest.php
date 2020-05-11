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

use DateTime;
use WBW\Library\XMLTV\Model\Audio;
use WBW\Library\XMLTV\Model\Credits;
use WBW\Library\XMLTV\Model\Date;
use WBW\Library\XMLTV\Model\LastChance;
use WBW\Library\XMLTV\Model\Length;
use WBW\Library\XMLTV\Model\OrigLanguage;
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
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Programme();
        $obj->setAudio($this->audio);
        $obj->setChannel("channel");
        $obj->setClumpIdx("clumpIdx");
        $obj->setCredits($this->credits);
        $obj->setDate($this->date);
        $obj->setLanguage($this->language);
        $obj->setLastChance($this->lastChance);
        $obj->setLength($this->length);
        $obj->setNew(true);
        $obj->setOrigLanguage($this->origLanguage);
        $obj->setPdcStart("pdcStart");
        $obj->setPremiere($this->premiere);
        $obj->setPreviouslyShown($this->previouslyShown);
        $obj->setShowView("showView");
        $obj->setStart("start");
        $obj->setStop("stop");
        $obj->setVideo($this->video);
        $obj->setVideoPlus("videoPlus");
        $obj->setVpsStart("vpsStart");
        $obj->addCategory($this->category);
        $obj->addCountry($this->country);
        $obj->addDesc($this->desc);
        $obj->addEpisodeNum($this->episodeNum);
        $obj->addIcon($this->icon);
        $obj->addKeyword($this->keyword);
        $obj->addRating($this->rating);
        $obj->addReview($this->review);
        $obj->addSecondaryTitle($this->secondaryTitle);
        $obj->addStarRating($this->starRating);
        $obj->addSubtitles($this->subtitles);
        $obj->addTitle($this->title);
        $obj->addUrl($this->url);

        $res = $obj->jsonSerialize();
        $this->assertCount(32, $res);

        $this->assertArrayHasKey("start", $res);
        $this->assertArrayHasKey("stop", $res);
        $this->assertArrayHasKey("pdcStart", $res);
        $this->assertArrayHasKey("vpsStart", $res);
        $this->assertArrayHasKey("showView", $res);
        $this->assertArrayHasKey("videoPlus", $res);
        $this->assertArrayHasKey("channel", $res);
        $this->assertArrayHasKey("clumpIdx", $res);
        $this->assertArrayHasKey("titles", $res);
        $this->assertArrayHasKey("secondaryTitles", $res);
        $this->assertArrayHasKey("descs", $res);
        $this->assertArrayHasKey("credits", $res);
        $this->assertArrayHasKey("date", $res);
        $this->assertArrayHasKey("categories", $res);
        $this->assertArrayHasKey("keywords", $res);
        $this->assertArrayHasKey("language", $res);
        $this->assertArrayHasKey("origLanguage", $res);
        $this->assertArrayHasKey("length", $res);
        $this->assertArrayHasKey("icons", $res);
        $this->assertArrayHasKey("urls", $res);
        $this->assertArrayHasKey("countries", $res);
        $this->assertArrayHasKey("episodeNums", $res);
        $this->assertArrayHasKey("video", $res);
        $this->assertArrayHasKey("audio", $res);
        $this->assertArrayHasKey("previouslyShown", $res);
        $this->assertArrayHasKey("premiere", $res);
        $this->assertArrayHasKey("lastChance", $res);
        $this->assertArrayHasKey("new", $res);
        $this->assertArrayHasKey("subtitles", $res);
        $this->assertArrayHasKey("ratings", $res);
        $this->assertArrayHasKey("starRatings", $res);
        $this->assertArrayHasKey("reviews", $res);
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

        $obj->setClumpIdx("clumpidx");
        $this->assertEquals("clumpidx", $obj->getClumpIdx());
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
     * Tests the setNew() method.
     *
     * @return void
     */
    public function testSetNew() {

        $obj = new Programme();

        $obj->setNew(false);
        $this->assertFalse($obj->getNew());
    }

    /**
     * Tests the setOrigLanguage() method.
     *
     * @return void
     */
    public function testSetOrigLanguage() {

        // Set an Orig language mock.
        $origLanguage = new OrigLanguage();

        $obj = new Programme();

        $obj->setOrigLanguage($origLanguage);
        $this->assertSame($origLanguage, $obj->getOrigLanguage());
    }

    /**
     * Tests the setPdcStart() method.
     *
     * @return void
     */
    public function testSetPdcStart() {

        $obj = new Programme();

        $obj->setPdcStart("20190930200000 +0200");
        $this->assertEquals("20190930200000 +0200", $obj->getPdcStart());

        $this->assertInstanceOf(DateTime::class, $obj->getPdcStartDateTime());
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

        $obj->setStart("20190730200000 +0200");
        $this->assertEquals("20190730200000 +0200", $obj->getStart());

        $this->assertInstanceOf(DateTime::class, $obj->getStartDateTime());
    }

    /**
     * Tests the setStop() method.
     *
     * @return void
     */
    public function testSetStop() {

        $obj = new Programme();

        $obj->setStop("20190730220000 +0200");
        $this->assertEquals("20190730220000 +0200", $obj->getStop());

        $this->assertInstanceOf(DateTime::class, $obj->getStopDateTime());
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

        $obj->setVpsStart("20190930200000 +0200");
        $this->assertEquals("20190930200000 +0200", $obj->getVpsStart());

        $this->assertInstanceOf(DateTime::class, $obj->getVpsStartDateTime());
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Programme();
        $obj->setAudio($this->audio);
        $obj->setChannel("channel");
        $obj->setClumpIdx("clumpIdx");
        $obj->setCredits($this->credits);
        $obj->setDate($this->date);
        $obj->setLanguage($this->language);
        $obj->setLastChance($this->lastChance);
        $obj->setLength($this->length);
        $obj->setNew(true);
        $obj->setOrigLanguage($this->origLanguage);
        $obj->setPdcStart("pdcStart");
        $obj->setPremiere($this->premiere);
        $obj->setPreviouslyShown($this->previouslyShown);
        $obj->setShowView("showView");
        $obj->setStart("start");
        $obj->setStop("stop");
        $obj->setVideo($this->video);
        $obj->setVideoPlus("videoPlus");
        $obj->setVpsStart("vpsStart");
        $obj->addCategory($this->category);
        $obj->addCountry($this->country);
        $obj->addDesc($this->desc);
        $obj->addEpisodeNum($this->episodeNum);
        $obj->addIcon($this->icon);
        $obj->addKeyword($this->keyword);
        $obj->addRating($this->rating);
        $obj->addReview($this->review);
        $obj->addSecondaryTitle($this->secondaryTitle);
        $obj->addStarRating($this->starRating);
        $obj->addSubtitles($this->subtitles);
        $obj->addTitle($this->title);
        $obj->addUrl($this->url);

        $res = '<programme start="start" stop="stop" pdc-start="pdcStart" vps-start="vpsStart" showview="showView" videoplus="videoPlus" channel="channel" clumpidx="clumpIdx"><title></title><sub-title></sub-title><desc></desc><credits></credits><date></date><category></category><keyword></keyword><language></language><orig-language></orig-language><length></length><icon/><url></url><country></country><episode-num></episode-num><video></video><audio></audio><previously-shown/><premiere></premiere><last-chance></last-chance><new/><subtitles></subtitles><rating></rating><star-rating></star-rating><review/></programme>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("programme", Programme::DOM_NODE_NAME);

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
        $this->assertNull($obj->getNew());
        $this->assertNull($obj->getOrigLanguage());
        $this->assertNull($obj->getPdcStart());
        $this->assertNull($obj->getPdcStartDateTime());
        $this->assertNull($obj->getPremiere());
        $this->assertNull($obj->getPreviouslyShown());
        $this->assertEquals([], $obj->getRatings());
        $this->assertEquals([], $obj->getReviews());
        $this->assertEquals([], $obj->getSecondaryTitles());
        $this->assertNull($obj->getShowView());
        $this->assertEquals([], $obj->getStarRatings());
        $this->assertNull($obj->getStart());
        $this->assertNull($obj->getStartDateTime());
        $this->assertNull($obj->getStop());
        $this->assertNull($obj->getStopDateTime());
        $this->assertEquals([], $obj->getSubtitles());
        $this->assertEquals([], $obj->getTitles());
        $this->assertEquals([], $obj->getUrls());
        $this->assertNull($obj->getVideo());
        $this->assertNull($obj->getVideoPlus());
        $this->assertNull($obj->getVpsStart());
        $this->assertNull($obj->getVpsStartDateTime());
    }
}
