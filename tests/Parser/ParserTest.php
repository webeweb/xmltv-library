<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Parser;

use WBW\Library\XMLTV\Model\Actor;
use WBW\Library\XMLTV\Model\Adapter;
use WBW\Library\XMLTV\Model\Aspect;
use WBW\Library\XMLTV\Model\Audio;
use WBW\Library\XMLTV\Model\Category;
use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Model\Colour;
use WBW\Library\XMLTV\Model\Commentator;
use WBW\Library\XMLTV\Model\Composer;
use WBW\Library\XMLTV\Model\Country;
use WBW\Library\XMLTV\Model\Credits;
use WBW\Library\XMLTV\Model\Date;
use WBW\Library\XMLTV\Model\Desc;
use WBW\Library\XMLTV\Model\Director;
use WBW\Library\XMLTV\Model\DisplayName;
use WBW\Library\XMLTV\Model\Editor;
use WBW\Library\XMLTV\Model\EpisodeNum;
use WBW\Library\XMLTV\Model\Guest;
use WBW\Library\XMLTV\Model\Icon;
use WBW\Library\XMLTV\Model\Keyword;
use WBW\Library\XMLTV\Model\Language;
use WBW\Library\XMLTV\Model\LastChance;
use WBW\Library\XMLTV\Model\Length;
use WBW\Library\XMLTV\Model\OrigLanguage;
use WBW\Library\XMLTV\Model\Premiere;
use WBW\Library\XMLTV\Model\Present;
use WBW\Library\XMLTV\Model\Presenter;
use WBW\Library\XMLTV\Model\PreviouslyShown;
use WBW\Library\XMLTV\Model\Producer;
use WBW\Library\XMLTV\Model\Quality;
use WBW\Library\XMLTV\Model\Rating;
use WBW\Library\XMLTV\Model\Review;
use WBW\Library\XMLTV\Model\StarRating;
use WBW\Library\XMLTV\Model\Stereo;
use WBW\Library\XMLTV\Model\SubTitle;
use WBW\Library\XMLTV\Model\Subtitles;
use WBW\Library\XMLTV\Model\Title;
use WBW\Library\XMLTV\Model\Url;
use WBW\Library\XMLTV\Model\Value;
use WBW\Library\XMLTV\Model\Video;
use WBW\Library\XMLTV\Model\Writer;
use WBW\Library\XMLTV\Parser\Parser;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Parser test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Parser
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
            ->childNodes->item(7)
            ->childNodes->item(1);

        $res = Parser::parseActor($node);
        $this->assertInstanceOf(Actor::class, $res);

        $this->assertEquals("Actor", $res->getContent());
        $this->assertEquals("role", $res->getRole());
    }

    /**
     * Tests the parseAdapter() method.
     *
     * @return void
     */
    public function testParseAdapter() {

        // tv > programme > credits > adapter
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(3);

        $res = Parser::parseAdapter($node);
        $this->assertInstanceOf(Adapter::class, $res);

        $this->assertEquals("Adapter", $res->getContent());
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
            ->childNodes->item(29)
            ->childNodes->item(5);

        $res = Parser::parseAspect($node);
        $this->assertInstanceOf(Aspect::class, $res);

        $this->assertEquals("Aspect", $res->getContent());
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
            ->childNodes->item(31);

        $res = Parser::parseAudio($node);
        $this->assertInstanceOf(Audio::class, $res);

        $this->assertInstanceOf(Present::class, $res->getPresent());
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
            ->childNodes->item(11);

        $res = Parser::parseCategory($node);
        $this->assertInstanceOf(Category::class, $res);

        $this->assertEquals("Category", $res->getContent());
        $this->assertEquals("category-lang", $res->getLang());
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

        $this->assertCount(1, $res->getDisplayNames());
        $this->assertInstanceOf(DisplayName::class, $res->getDisplayNames()[0]);

        $this->assertCount(1, $res->getIcons());
        $this->assertInstanceOf(Icon::class, $res->getIcons()[0]);

        $this->assertCount(1, $res->getUrls());
        $this->assertInstanceOf(Url::class, $res->getUrls()[0]);
    }

    /**
     * Tests the parseColour() method.
     *
     * @return void
     */
    public function testParseColour() {

        // tv > programme > video > colour
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(29)
            ->childNodes->item(3);

        $res = Parser::parseColour($node);
        $this->assertInstanceOf(Colour::class, $res);

        $this->assertEquals("Colour", $res->getContent());
    }

    /**
     * Tests the parseCommentator() method.
     *
     * @return void
     */
    public function testParseCommentator() {

        // tv > programme > credits > commentator
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(5);

        $res = Parser::parseCommentator($node);
        $this->assertInstanceOf(Commentator::class, $res);

        $this->assertEquals("Commentator", $res->getContent());
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
            ->childNodes->item(7)
            ->childNodes->item(7);

        $res = Parser::parseComposer($node);
        $this->assertInstanceOf(Composer::class, $res);

        $this->assertEquals("Composer", $res->getContent());
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
            ->childNodes->item(25);

        $res = Parser::parseCountry($node);
        $this->assertInstanceOf(Country::class, $res);

        $this->assertEquals("Country", $res->getContent());
        $this->assertEquals("country-lang", $res->getLang());
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
            ->childNodes->item(7);

        $res = Parser::parseCredits($node);
        $this->assertInstanceOf(Credits::class, $res);

        $this->assertCount(1, $res->getActors());
        $this->assertInstanceOf(Actor::class, $res->getActors()[0]);

        $this->assertCount(1, $res->getAdapters());
        $this->assertInstanceOf(Adapter::class, $res->getAdapters()[0]);

        $this->assertCount(1, $res->getCommentators());
        $this->assertInstanceOf(Commentator::class, $res->getCommentators()[0]);

        $this->assertCount(1, $res->getComposers());
        $this->assertInstanceOf(Composer::class, $res->getComposers()[0]);

        $this->assertCount(1, $res->getDirectors());
        $this->assertInstanceOf(Director::class, $res->getDirectors()[0]);

        $this->assertCount(1, $res->getEditors());
        $this->assertInstanceOf(Editor::class, $res->getEditors()[0]);

        $this->assertCount(1, $res->getGuests());
        $this->assertInstanceOf(Guest::class, $res->getGuests()[0]);

        $this->assertCount(1, $res->getPresenters());
        $this->assertInstanceOf(Presenter::class, $res->getPresenters()[0]);

        $this->assertCount(1, $res->getProducers());
        $this->assertInstanceOf(Producer::class, $res->getProducers()[0]);

        $this->assertCount(1, $res->getWriters());
        $this->assertInstanceOf(Writer::class, $res->getWriters()[0]);
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
            ->childNodes->item(9);

        $res = Parser::parseDate($node);
        $this->assertInstanceOf(Date::class, $res);

        $this->assertEquals(1970, $res->getContent());
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
            ->childNodes->item(5);

        $res = Parser::parseDesc($node);
        $this->assertInstanceOf(Desc::class, $res);

        $this->assertEquals("Desc", $res->getContent());
        $this->assertEquals("desc-lang", $res->getLang());
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
            ->childNodes->item(7)
            ->childNodes->item(9);

        $res = Parser::parseDirector($node);
        $this->assertInstanceOf(Director::class, $res);

        $this->assertEquals("Director", $res->getContent());
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

        $this->assertEquals("Display name", $res->getContent());
    }

    /**
     * Tests the parseEditor() method.
     *
     * @return void
     */
    public function testParseEditor() {

        // tv > programme > credits > editor
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(11);

        $res = Parser::parseEditor($node);
        $this->assertInstanceOf(Editor::class, $res);

        $this->assertEquals("Editor", $res->getContent());
    }

    /**
     * Tests the parseEpisodeNum() method.
     *
     * @return void
     */
    public function testParseEpisodeNum() {

        // tv > programme > episode-num
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(27);

        $res = Parser::parseEpisodeNum($node);
        $this->assertInstanceOf(EpisodeNum::class, $res);

        $this->assertEquals("Episode num", $res->getContent());
        $this->assertEquals("episode-num-system", $res->getSystem());
    }

    /**
     * Tests the parseGuest() method.
     *
     * @return void
     */
    public function testParseGuest() {

        // tv > programme > credits > guest
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(13);

        $res = Parser::parseGuest($node);
        $this->assertInstanceOf(Guest::class, $res);

        $this->assertEquals("Guest", $res->getContent());
    }

    /**
     * Tests the parseIcon() method.
     *
     * @return void
     */
    public function testParseIcon() {

        // tv > channel > icon
        $node = $this->document->documentElement
            ->childNodes->item(1)
            ->childNodes->item(3);

        $res = Parser::parseIcon($node);
        $this->assertInstanceOf(Icon::class, $res);

        $this->assertEquals("src", $res->getSrc());
        $this->assertEquals(1920, $res->getWidth());
        $this->assertEquals(1080, $res->getHeight());
    }

    /**
     * Tests the parseKeyword() method.
     *
     * @return void
     */
    public function testParseKeyword() {

        // tv > programme > keyword
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(13);

        $res = Parser::parseKeyword($node);
        $this->assertInstanceOf(Keyword::class, $res);

        $this->assertEquals("Keyword", $res->getContent());
        $this->assertEquals("keyword-lang", $res->getLang());
    }

    /**
     * Tests the parseLanguage() method.
     *
     * @return void
     */
    public function testParseLanguage() {

        // tv > programme > language
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(15);

        $res = Parser::parseLanguage($node);
        $this->assertInstanceOf(Language::class, $res);

        $this->assertEquals("Language", $res->getContent());
        $this->assertEquals("language-lang", $res->getLang());
    }

    /**
     * Tests the parseLastChance() method.
     *
     * @return void
     */
    public function testParseLastChance() {

        // tv > programme > last-chance
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(37);

        $res = Parser::parseLastChance($node);
        $this->assertInstanceOf(LastChance::class, $res);

        $this->assertEquals("Last chance", $res->getContent());
        $this->assertEquals("last-chance-lang", $res->getLang());
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
            ->childNodes->item(19);

        $res = Parser::parseLength($node);
        $this->assertInstanceOf(Length::class, $res);

        $this->assertEquals(90, $res->getContent());
        $this->assertEquals("minutes", $res->getUnits());
    }

    /**
     * Tests the parseOrigLanguage() method.
     *
     * @return void
     */
    public function testParseOrigLanguage() {

        // tv > programme > orig-language
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(17);

        $res = Parser::parseOrigLanguage($node);
        $this->assertInstanceOf(OrigLanguage::class, $res);

        $this->assertEquals("Orig language", $res->getContent());
        $this->assertEquals("orig-language-lang", $res->getLang());
    }

    /**
     * Tests the parsePremiere() method.
     *
     * @return void
     */
    public function testParsePremiere() {

        // tv > programme > premiere
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(35);

        $res = Parser::parsePremiere($node);
        $this->assertInstanceOf(Premiere::class, $res);

        $this->assertEquals("Premiere", $res->getContent());
        $this->assertEquals("premiere-lang", $res->getLang());
    }

    /**
     * Tests the parsePresent() method.
     *
     * @return void
     */
    public function testParsePresent() {

        // tv > programme > video > present
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(29)
            ->childNodes->item(1);

        $res = Parser::parsePresent($node);
        $this->assertInstanceOf(Present::class, $res);

        $this->assertEquals("Present", $res->getContent());
    }

    /**
     * Tests the parsePresenter() method.
     *
     * @return void
     */
    public function testParsePresenter() {

        // tv > programme > credits > presenter
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(15);

        $res = Parser::parsePresenter($node);
        $this->assertInstanceOf(Presenter::class, $res);

        $this->assertEquals("Presenter", $res->getContent());
    }

    /**
     * Tests the parsePreviouslyShown() method.
     *
     * @return void
     */
    public function testParsePreviouslyShown() {

        // tv > programme > previously-shown
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(33);

        $res = Parser::parsePreviouslyShown($node);
        $this->assertInstanceOf(PreviouslyShown::class, $res);

        $this->assertEquals("channel-id", $res->getChannel());
        $this->assertEquals("previously-shown-start", $res->getStart());
    }

    /**
     * Tests the parseProducer() method.
     *
     * @return void
     */
    public function testParseProducer() {

        // tv > programme > credits > producer
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(17);

        $res = Parser::parseProducer($node);
        $this->assertInstanceOf(Producer::class, $res);

        $this->assertEquals("Producer", $res->getContent());
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
            ->childNodes->item(29)
            ->childNodes->item(7);

        $res = Parser::parseQuality($node);
        $this->assertInstanceOf(Quality::class, $res);

        $this->assertEquals("Quality", $res->getContent());
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
            ->childNodes->item(43);

        $res = Parser::parseRating($node);
        $this->assertInstanceOf(Rating::class, $res);

        $this->assertCount(1, $res->getIcons());
        $this->assertInstanceOf(Icon::class, $res->getIcons()[0]);

        $this->assertEquals("rating-system", $res->getSystem());
        $this->assertInstanceOf(Value::class, $res->getValue());
    }

    /**
     * Tests the parseReview() method.
     *
     * @return void
     */
    public function testParseReview() {

        // tv > programme > review
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(47);

        $res = Parser::parseReview($node);
        $this->assertInstanceOf(Review::class, $res);

        $this->assertEquals("review-lang", $res->getLang());
        $this->assertEquals("reviewer", $res->getReviewer());
        $this->assertEquals("source", $res->getSource());
        $this->assertEquals("review-type", $res->getType());
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
            ->childNodes->item(45);

        $res = Parser::parseStarRating($node);
        $this->assertInstanceOf(StarRating::class, $res);

        $this->assertCount(1, $res->getIcons());
        $this->assertInstanceOf(Icon::class, $res->getIcons()[0]);

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
            ->childNodes->item(31)
            ->childNodes->item(3);

        $res = Parser::parseStereo($node);
        $this->assertInstanceOf(Stereo::class, $res);

        $this->assertEquals("Stereo", $res->getContent());
    }

    /**
     * Tests the parseSubTitle() method.
     *
     * @return void
     */
    public function testParseSubTitle() {

        // tv > programme > sub-title
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(3);

        $res = Parser::parseSubTitle($node);
        $this->assertInstanceOf(SubTitle::class, $res);

        $this->assertEquals("Sub-title", $res->getContent());
        $this->assertEquals("sub-title-lang", $res->getLang());
    }

    /**
     * Tests the parseSubtitles() method.
     *
     * @return void
     */
    public function testParseSubtitles() {

        // tv > programme > subtitles
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(41);

        $res = Parser::parseSubtitles($node);
        $this->assertInstanceOf(Subtitles::class, $res);

        $this->assertInstanceOf(Language::class, $res->getLanguage());
        $this->assertEquals("subtitles-type", $res->getType());
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

        $this->assertEquals("Title", $res->getContent());
        $this->assertEquals("title-lang", $res->getLang());
    }

    /**
     * Tests the parseUrl() method.
     *
     * @return void
     */
    public function testParseUrl() {

        // tv > channel > url
        $node = $this->document->documentElement
            ->childNodes->item(1)
            ->childNodes->item(5);

        $res = Parser::parseUrl($node);
        $this->assertInstanceOf(Url::class, $res);

        $this->assertEquals("URL", $res->getContent());
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
            ->childNodes->item(43)
            ->childNodes->item(1);

        $res = Parser::parseValue($node);
        $this->assertInstanceOf(Value::class, $res);

        $this->assertEquals("Value", $res->getContent());
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
            ->childNodes->item(29);

        $res = Parser::parseVideo($node);
        $this->assertInstanceOf(Video::class, $res);

        $this->assertInstanceOf(Aspect::class, $res->getAspect());
        $this->assertInstanceOf(Colour::class, $res->getColour());
        $this->assertInstanceOf(Present::class, $res->getPresent());
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
            ->childNodes->item(7)
            ->childNodes->item(19);

        $res = Parser::parseWriter($node);
        $this->assertInstanceOf(Writer::class, $res);

        $this->assertEquals("Writer", $res->getContent());
    }
}
