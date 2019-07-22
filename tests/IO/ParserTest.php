<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\IO;

use WBW\Library\XMLTV\IO\Parser;
use WBW\Library\XMLTV\Model\Actor;
use WBW\Library\XMLTV\Model\Aspect;
use WBW\Library\XMLTV\Model\Audio;
use WBW\Library\XMLTV\Model\Category;
use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Model\Composer;
use WBW\Library\XMLTV\Model\Country;
use WBW\Library\XMLTV\Model\Credits;
use WBW\Library\XMLTV\Model\Date;
use WBW\Library\XMLTV\Model\Desc;
use WBW\Library\XMLTV\Model\Director;
use WBW\Library\XMLTV\Model\DisplayName;
use WBW\Library\XMLTV\Model\Guest;
use WBW\Library\XMLTV\Model\Icon;
use WBW\Library\XMLTV\Model\Length;
use WBW\Library\XMLTV\Model\Programme;
use WBW\Library\XMLTV\Model\Quality;
use WBW\Library\XMLTV\Model\Rating;
use WBW\Library\XMLTV\Model\StarRating;
use WBW\Library\XMLTV\Model\Stereo;
use WBW\Library\XMLTV\Model\Title;
use WBW\Library\XMLTV\Model\TV;
use WBW\Library\XMLTV\Model\Value;
use WBW\Library\XMLTV\Model\Video;
use WBW\Library\XMLTV\Model\Writer;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Parser test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\IO
 */
class ParserTest extends AbstractTestCase {

    /**
     * Tests the parseActor() method.
     *
     * @return void
     */
    public function testParseActor() {

        // tv > programme > credits > actor
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(5)
            ->childNodes->item(3);

        $res = Parser::parseActor($node);
        $this->assertInstanceOf(Actor::class, $res);

        $this->assertEquals("Richard Harrison (Frankie Ross)", $res->getContent());
    }

    /**
     * Tests the parseAspect() method.
     *
     * @return void
     */
    public function testParseAspect() {

        // tv > programme > video > aspect
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(17)
            ->childNodes->item(1);

        $res = Parser::parseAspect($node);
        $this->assertInstanceOf(Aspect::class, $res);

        $this->assertEquals("16:9", $res->getContent());
    }

    /**
     * Tests the parseAudio() method.
     *
     * @return void
     */
    public function testParseAudio() {

        // tv > programme > audio
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(23);

        $res = Parser::parseAudio($node);
        $this->assertInstanceOf(Audio::class, $res);

        $this->assertInstanceOf(Stereo::class, $res->getStereo());
    }

    /**
     * Tests the parseCategory() method.
     *
     * @return void
     */
    public function testParseCategory() {

        // tv > programme > category
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(9);

        $res = Parser::parseCategory($node);
        $this->assertInstanceOf(Category::class, $res);

        $this->assertEquals("film d'aventures", $res->getContent());
        $this->assertEquals("fr", $res->getLang());
    }

    /**
     * Tests the parseChannel() method.
     *
     * @return void
     */
    public function testParseChannel() {

        // tv > channel
        $node = $this->document->documentElement
            ->childNodes->item(1);

        $res = Parser::parseChannel($node);
        $this->assertInstanceOf(Channel::class, $res);

        $this->assertInstanceOf(DisplayName::class, $res->getDisplayName());
        $this->assertInstanceOf(Icon::class, $res->getIcon());
    }

    /**
     * Tests the parseComposer() method.
     *
     * @return void
     */
    public function testParseComposer() {

        // tv > programme > credits > composer
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(5)
            ->childNodes->item(25);

        $res = Parser::parseComposer($node);
        $this->assertInstanceOf(Composer::class, $res);

        $this->assertEquals("Giovanni Fusco", $res->getContent());
    }

    /**
     * Tests the parseCountry() method.
     *
     * @return void
     */
    public function testParseCountry() {

        // tv > programme > country
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(15);

        $res = Parser::parseCountry($node);
        $this->assertInstanceOf(Country::class, $res);

        $this->assertEquals("Espagne - Italie", $res->getContent());
    }

    /**
     * Tests the parseCredits() method.
     *
     * @return void
     */
    public function testParseCredits() {

        // tv > programme > credits
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(5);

        $res = Parser::parseCredits($node);
        $this->assertInstanceOf(Credits::class, $res);

        $this->assertCount(8, $res->getActors());
        $this->assertCount(1, $res->getComposers());
        $this->assertCount(1, $res->getDirectors());
        $this->assertCount(1, $res->getGuests());
        $this->assertCount(3, $res->getWriters());
    }

    /**
     * Tests the parseDate() method.
     *
     * @return void
     */
    public function testParseDate() {

        // tv > programme > date
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7);

        $res = Parser::parseDate($node);
        $this->assertInstanceOf(Date::class, $res);

        $this->assertEquals(1964, $res->getContent());
    }

    /**
     * Tests the parseDesc() method.
     *
     * @return void
     */
    public function testParseDesc() {

        // tv > programme > desc
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(3);

        $res = Parser::parseDesc($node);
        $this->assertInstanceOf(Desc::class, $res);

        $this->assertRegExp("/^En 1890/", $res->getContent());
        $this->assertEquals("fr", $res->getLang());
    }

    /**
     * Tests the parseDirector() method.
     *
     * @return void
     */
    public function testParseDirector() {

        // tv > programme > credits > director
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(5)
            ->childNodes->item(1);

        $res = Parser::parseDirector($node);
        $this->assertInstanceOf(Director::class, $res);

        $this->assertEquals("Umberto Lenzi", $res->getContent());
    }

    /**
     * Tests the parseDisplayName() method.
     *
     * @return void
     */
    public function testParseDisplayName() {

        // tv > channel > display-name
        $node = $this->document->documentElement
            ->childNodes->item(1)
            ->childNodes->item(1);

        $res = Parser::parseDisplayName($node);
        $this->assertInstanceOf(DisplayName::class, $res);

        $this->assertEquals("Action", $res->getContent());
    }

    /**
     * Tests the parseGuest() method.
     *
     * @return void
     */
    public function testParseGuest() {

        // tv > programme > credits > writer
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(5)
            ->childNodes->item(27);

        $res = Parser::parseGuest($node);
        $this->assertInstanceOf(Guest::class, $res);

        $this->assertEquals("Ian Kennedy Martin", $res->getContent());
    }

    /**
     * Tests the parseIcon() method.
     *
     * @return void
     */
    public function testParseIcon() {

        // tv > programme > icon
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(13);

        $res = Parser::parseIcon($node);
        $this->assertInstanceOf(Icon::class, $res);

        $this->assertEquals("https://television.github.com/sites/tr_master/files/sheet_media/media/169_emi_867956.jpg", $res->getSrc());
    }

    /**
     * Tests the parseLength() method.
     *
     * @return void
     */
    public function testParseLength() {

        // tv > programme > length
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(11);

        $res = Parser::parseLength($node);
        $this->assertInstanceOf(Length::class, $res);

        $this->assertEquals(93, $res->getContent());
        $this->assertEquals("minutes", $res->getUnits());
    }

    /**
     * Tests the parseProgramme() method.
     *
     * @return void
     */
    public function testParseProgramme() {

        // tv > programme
        $node = $this->document->documentElement
            ->childNodes->item(3);

        $res = Parser::parseProgramme($node);
        $this->assertInstanceOf(Programme::class, $res);

        $this->assertInstanceOf(Category::class, $res->getCategory());
        $this->assertEquals("C10.api.github.com", $res->getChannel());
        $this->assertInstanceOf(Country::class, $res->getCountry());
        $this->assertInstanceOf(Credits::class, $res->getCredits());
        $this->assertInstanceOf(Date::class, $res->getDate());
        $this->assertInstanceOf(Desc::class, $res->getDesc());
        $this->assertInstanceOf(Icon::class, $res->getIcon());
        $this->assertInstanceOf(Length::class, $res->getLength());
        $this->assertInstanceOf(Rating::class, $res->getRating());
        $this->assertEquals("", $res->getShowView());
        $this->assertEquals("20190711070900 +0200", $res->getStart());
        $this->assertEquals("20190711084200 +0200", $res->getStop());
        $this->assertInstanceOf(Title::class, $res->getTitle());
    }

    /**
     * Tests the parseQuality() method.
     *
     * @return void
     */
    public function testParseQuality() {

        // tv > programme > video > quality
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(17)
            ->childNodes->item(3);

        $res = Parser::parseQuality($node);
        $this->assertInstanceOf(Quality::class, $res);

        $this->assertEquals("HDTV", $res->getContent());
    }

    /**
     * Tests the parseRating() method.
     *
     * @return void
     */
    public function testParseRating() {

        // tv > programme > rating
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(19);

        $res = Parser::parseRating($node);
        $this->assertInstanceOf(Rating::class, $res);

        $this->assertInstanceOf(Icon::class, $res->getIcon());
        $this->assertEquals("CSA", $res->getSystem());
        $this->assertInstanceOf(Value::class, $res->getValue());
    }

    /**
     * Tests the parseStarRating() method.
     *
     * @return void
     */
    public function testParseStarRating() {

        // tv > programme > star-rating
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(21);

        $res = Parser::parseStarRating($node);
        $this->assertInstanceOf(StarRating::class, $res);

        $this->assertInstanceOf(Value::class, $res->getValue());
    }

    /**
     * Tests the parseStereo() method.
     *
     * @return void
     */
    public function testParseStereo() {

        // tv > programme > audio > stereo
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(23)
            ->childNodes->item(1);

        $res = Parser::parseStereo($node);
        $this->assertInstanceOf(Stereo::class, $res);

        $this->assertEquals("bilingual", $res->getContent());
    }

    /**
     * Tests the parseTV() method.
     *
     * @return void
     */
    public function testParseTV() {

        // tv
        $node = $this->document->documentElement;

        $res = Parser::parseTV($node);
        $this->assertInstanceOf(TV::class, $res);

        $this->assertCount(1, $res->getChannels());
        $this->assertCount(1, $res->getProgrammes());
        $this->assertEquals("GitHub", $res->getGeneratorInfoName());
        $this->assertEquals("https://github.com", $res->getGeneratorInfoURL());
        $this->assertEquals("https://data.github.com", $res->getSourceDataURL());
        $this->assertEquals("https://info.github.com", $res->getSourceInfoURL());
    }

    /**
     * Tests the parseTitle() method.
     *
     * @return void
     */
    public function testParseTitle() {

        // tv > programme > title
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(1);

        $res = Parser::parseTitle($node);
        $this->assertInstanceOf(Title::class, $res);

        $this->assertEquals("Les trois sergents de Fort Madras", $res->getContent());
    }

    /**
     * Tests the parseValue() method.
     *
     * @return void
     */
    public function testParseValue() {

        // tv > programme > rating > value
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(19)
            ->childNodes->item(1);

        $res = Parser::parseValue($node);
        $this->assertInstanceOf(Value::class, $res);

        $this->assertEquals("Tout public", $res->getContent());
    }

    /**
     * Tests the parseVideo() method.
     *
     * @return void
     */
    public function testParseVideo() {

        // tv > programme > video
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(17);

        $res = Parser::parseVideo($node);
        $this->assertInstanceOf(Video::class, $res);

        $this->assertInstanceOf(Aspect::class, $res->getAspect());
        $this->assertInstanceOf(Quality::class, $res->getQuality());
    }

    /**
     * Tests the parseWriter() method.
     *
     * @return void
     */
    public function testParseWriter() {

        // tv > programme > credits > writer
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(5)
            ->childNodes->item(19);

        $res = Parser::parseWriter($node);
        $this->assertInstanceOf(Writer::class, $res);

        $this->assertEquals("Umberto Lenzi", $res->getContent());
    }
}
