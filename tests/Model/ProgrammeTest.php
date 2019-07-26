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
use WBW\Library\XMLTV\Model\Category;
use WBW\Library\XMLTV\Model\Country;
use WBW\Library\XMLTV\Model\Credits;
use WBW\Library\XMLTV\Model\Date;
use WBW\Library\XMLTV\Model\Desc;
use WBW\Library\XMLTV\Model\EpisodeNum;
use WBW\Library\XMLTV\Model\Keyword;
use WBW\Library\XMLTV\Model\LastChance;
use WBW\Library\XMLTV\Model\Length;
use WBW\Library\XMLTV\Model\Premiere;
use WBW\Library\XMLTV\Model\PreviouslyShown;
use WBW\Library\XMLTV\Model\Programme;
use WBW\Library\XMLTV\Model\Rating;
use WBW\Library\XMLTV\Model\Review;
use WBW\Library\XMLTV\Model\StarRating;
use WBW\Library\XMLTV\Model\SubTitle;
use WBW\Library\XMLTV\Model\Title;
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
     * Tests the addCategory() method.
     *
     * @return void
     */
    public function testAddCategory() {

        // Set a Category mock.
        $category = new Category();

        $obj = new Programme();

        $obj->addCategory($category);
        $this->assertCount(1, $obj->getCategories());
        $this->assertSame($category, $obj->getCategories()[0]);
        $this->assertTrue($obj->hasCategories());
    }

    /**
     * Tests the addCountry() method.
     *
     * @return void
     */
    public function testAddCountry() {

        // Set a Country mock.
        $country = new Country();

        $obj = new Programme();

        $obj->addCountry($country);
        $this->assertCount(1, $obj->getCountries());
        $this->assertSame($country, $obj->getCountries()[0]);
        $this->assertTrue($obj->hasCountries());
    }

    /**
     * Tests the addDesc() method.
     *
     * @return void
     */
    public function testAddDesc() {

        // Set a Desc mock.
        $desc = new Desc();

        $obj = new Programme();

        $obj->addDesc($desc);
        $this->assertCount(1, $obj->getDescs());
        $this->assertSame($desc, $obj->getDescs()[0]);
        $this->assertTrue($obj->hasDescs());
    }

    /**
     * Tests the addEpisodeNum() method.
     *
     * @return void
     */
    public function testAddEpisodeNum() {

        // Set an Episode num mock.
        $episodeNum = new EpisodeNum();

        $obj = new Programme();

        $obj->addEpisodeNum($episodeNum);
        $this->assertCount(1, $obj->getEpisodeNums());
        $this->assertSame($episodeNum, $obj->getEpisodeNums()[0]);
        $this->assertTrue($obj->hasEpisodeNums());
    }

    /**
     * Tests the addKeyword() method.
     *
     * @return void
     */
    public function testAddKeyword() {

        // Set a Keyword mock.
        $keyword = new Keyword();

        $obj = new Programme();

        $obj->addKeyword($keyword);
        $this->assertCount(1, $obj->getKeywords());
        $this->assertSame($keyword, $obj->getKeywords()[0]);
        $this->assertTrue($obj->hasKeywords());
    }

    /**
     * Tests the addRating() method.
     *
     * @return void
     */
    public function testAddRating() {

        // Set a Rating mock.
        $rating = new Rating();

        $obj = new Programme();

        $obj->addRating($rating);
        $this->assertCount(1, $obj->getRatings());
        $this->assertSame($rating, $obj->getRatings()[0]);
        $this->assertTrue($obj->hasRatings());
    }

    /**
     * Tests the addReview() method.
     *
     * @return void
     */
    public function testAddReview() {

        // Set a Review mock.
        $review = new Review();

        $obj = new Programme();

        $obj->addReview($review);
        $this->assertCount(1, $obj->getReviews());
        $this->assertSame($review, $obj->getReviews()[0]);
        $this->assertTrue($obj->hasReviews());
    }

    /**
     * Tests the addStarRating() method.
     *
     * @return void
     */
    public function testAddStarRating() {

        // Set a Star rating mock.
        $starRating = new StarRating();

        $obj = new Programme();

        $obj->addStarRating($starRating);
        $this->assertCount(1, $obj->getStarRatings());
        $this->assertSame($starRating, $obj->getStarRatings()[0]);
        $this->assertTrue($obj->hasStarRatings());
    }

    /**
     * Tests the addSubTitle() method.
     *
     * @return void
     */
    public function testAddSubTitle() {

        // Set a Sub-title mock.
        $subTitle = new SubTitle();

        $obj = new Programme();

        $obj->addSubTitle($subTitle);
        $this->assertCount(1, $obj->getSubTitles());
        $this->assertSame($subTitle, $obj->getSubTitles()[0]);
        $this->assertTrue($obj->hasSubTitles());
    }

    /**
     * Tests the addTitle() method.
     *
     * @return void
     */
    public function testAddTitle() {

        // Set a Title mock.
        $title = new Title();

        $obj = new Programme();

        $obj->addTitle($title);
        $this->assertCount(1, $obj->getTitles());
        $this->assertSame($title, $obj->getTitles()[0]);
        $this->assertTrue($obj->hasTitles());
    }

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
        $this->assertFalse($obj->hasCategories());
        $this->assertFalse($obj->hasCountries());
        $this->assertFalse($obj->hasDescs());
        $this->assertFalse($obj->hasEpisodeNums());
        $this->assertFalse($obj->hasKeywords());
        $this->assertFalse($obj->hasRatings());
        $this->assertFalse($obj->hasReviews());
        $this->assertFalse($obj->hasStarRatings());
        $this->assertFalse($obj->hasSubTitles());
        $this->assertFalse($obj->hasTitles());
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
