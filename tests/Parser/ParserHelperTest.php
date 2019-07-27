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

use DOMDocument;
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
use WBW\Library\XMLTV\Model\Programme;
use WBW\Library\XMLTV\Model\Quality;
use WBW\Library\XMLTV\Model\Rating;
use WBW\Library\XMLTV\Model\Review;
use WBW\Library\XMLTV\Model\StarRating;
use WBW\Library\XMLTV\Model\Stereo;
use WBW\Library\XMLTV\Model\SubTitle;
use WBW\Library\XMLTV\Model\Subtitles;
use WBW\Library\XMLTV\Model\Title;
use WBW\Library\XMLTV\Model\Tv;
use WBW\Library\XMLTV\Model\Url;
use WBW\Library\XMLTV\Model\Value;
use WBW\Library\XMLTV\Model\Video;
use WBW\Library\XMLTV\Model\Writer;
use WBW\Library\XMLTV\Parser\ParserHelper;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Parser\TestParserHelper;

/**
 * Parser helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Parser
 */
class ParserHelperTest extends AbstractTestCase {

    /**
     * Document
     *
     * @var DOMDocument
     */
    protected $document;

    /**
     * {@inheritDoc}
     */
    protected function setUp() {
        parent::setUp();

        $filename = getcwd() . "/tests/Fixtures/xmltv.xml";

        // Set a DOM document mock.
        $this->document = new DOMDocument;
        $this->document->load($filename);
    }

    /**
     * Tests the getDOMAttributeValue() method.
     *
     * @return void
     */
    public function testGetDOMAttributeValue() {

        $tvNode          = $this->document->documentElement;
        $displayNameNode = $tvNode->childNodes->item(1)->childNodes->item(1);

        $this->assertNull(TestParserHelper::getDOMAttributeValue($displayNameNode, ""));
        $this->assertNull(TestParserHelper::getDOMAttributeValue($tvNode, ""));
        $this->assertEquals("date", TestParserHelper::getDOMAttributeValue($tvNode, "date"));
    }

    /**
     * Tests the getDOMNodeByName() method.
     */
    public function testGetDOMNodeByName() {

        $tvNode = $this->document->documentElement;

        $res = TestParserHelper::getDOMNodeByName($tvNode->childNodes, "channel");
        $this->assertNotNull($res);
        $this->assertEquals("channel", $res->nodeName);

        $this->assertNull(TestParserHelper::getDOMNodeByName($tvNode->childNodes, "name"));;
    }

    /**
     * Tests the getDOMNodesByName() method.
     *
     * @return void
     */
    public function testGetDOMNodesByName() {

        $tvNode = $this->document->documentElement;

        $res = TestParserHelper::getDOMNodesByName($tvNode->childNodes, "channel");
        $this->assertCount(1, $res);
        $this->assertEquals("channel", $res[0]->nodeName);
    }

    /**
     * Tests the getDOMNodesByName() method.
     *
     * @return void
     */
    public function testGetDOMNodesByNameWithNull() {

        $this->assertEquals([], TestParserHelper::getDOMNodesByName(null, "channel"));
    }

    /**
     * Tests the getMethodName() method.
     *
     * @return void
     */
    public function testGetMethodeName() {

        $this->assertEquals("addDisplayName", TestParserHelper::getMethodName("add", "display-name"));
        $this->assertEquals("setUrl", TestParserHelper::getMethodName("set", "url"));
    }

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

        $res = ParserHelper::parseActor($node);
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

        $res = ParserHelper::parseAdapter($node);
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

        $res = ParserHelper::parseAspect($node);
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

        $res = ParserHelper::parseAudio($node);
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

        $res = ParserHelper::parseCategory($node);
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

        $res = ParserHelper::parseChannel($node);
        $this->assertInstanceOf(Channel::class, $res);

        $this->assertInstanceOf(DisplayName::class, $res->getDisplayNames()[0]);
        $this->assertInstanceOf(Icon::class, $res->getIcons()[0]);
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

        $res = ParserHelper::parseColour($node);
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

        $res = ParserHelper::parseCommentator($node);
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

        $res = ParserHelper::parseComposer($node);
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

        $res = ParserHelper::parseCountry($node);
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

        $res = ParserHelper::parseCredits($node);
        $this->assertInstanceOf(Credits::class, $res);

        $this->assertInstanceOf(Actor::class, $res->getActors()[0]);
        $this->assertInstanceOf(Adapter::class, $res->getAdapters()[0]);
        $this->assertInstanceOf(Commentator::class, $res->getCommentators()[0]);
        $this->assertInstanceOf(Composer::class, $res->getComposers()[0]);
        $this->assertInstanceOf(Director::class, $res->getDirectors()[0]);
        $this->assertInstanceOf(Editor::class, $res->getEditors()[0]);
        $this->assertInstanceOf(Guest::class, $res->getGuests()[0]);
        $this->assertInstanceOf(Presenter::class, $res->getPresenters()[0]);
        $this->assertInstanceOf(Producer::class, $res->getProducers()[0]);
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

        $res = ParserHelper::parseDate($node);
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

        $res = ParserHelper::parseDesc($node);
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

        $res = ParserHelper::parseDirector($node);
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

        $res = ParserHelper::parseDisplayName($node);
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

        $res = ParserHelper::parseEditor($node);
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

        $res = ParserHelper::parseEpisodeNum($node);
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

        $res = ParserHelper::parseGuest($node);
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

        $res = ParserHelper::parseIcon($node);
        $this->assertInstanceOf(Icon::class, $res);

        $this->assertEquals(1080, $res->getHeight());
        $this->assertEquals("src", $res->getSrc());
        $this->assertEquals(1920, $res->getWidth());
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

        $res = ParserHelper::parseKeyword($node);
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

        $res = ParserHelper::parseLanguage($node);
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

        $res = ParserHelper::parseLastChance($node);
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

        $res = ParserHelper::parseLength($node);
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

        $res = ParserHelper::parseOrigLanguage($node);
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

        $res = ParserHelper::parsePremiere($node);
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

        $res = ParserHelper::parsePresent($node);
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

        $res = ParserHelper::parsePresenter($node);
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

        $res = ParserHelper::parsePreviouslyShown($node);
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

        $res = ParserHelper::parseProducer($node);
        $this->assertInstanceOf(Producer::class, $res);

        $this->assertEquals("Producer", $res->getContent());
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

        $res = ParserHelper::parseProgramme($node);
        $this->assertInstanceOf(Programme::class, $res);

        $this->assertInstanceOf(Audio::class, $res->getAudio());
        $this->assertInstanceOf(Category::class, $res->getCategories()[0]);
        $this->assertEquals("channel-id", $res->getChannel());
        $this->assertTrue($res->getClumpIdx());
        $this->assertCount(1, $res->getCountries());
        $this->assertInstanceOf(Country::class, $res->getCountries()[0]);
        $this->assertInstanceOf(Credits::class, $res->getCredits());
        $this->assertInstanceOf(Date::class, $res->getDate());
        $this->assertInstanceOf(Desc::class, $res->getDescs()[0]);
        $this->assertInstanceOf(EpisodeNum::class, $res->getEpisodeNums()[0]);
        $this->assertInstanceOf(Icon::class, $res->getIcons()[0]);
        $this->assertInstanceOf(Keyword::class, $res->getKeywords()[0]);
        $this->assertInstanceOf(Language::class, $res->getLanguage());
        $this->assertInstanceOf(LastChance::class, $res->getLastChance());
        $this->assertInstanceOf(Length::class, $res->getLength());
        $this->assertTrue($res->getNew());
        $this->assertEquals("pdc-start", $res->getPdcStart());
        $this->assertInstanceOf(Premiere::class, $res->getPremiere());
        $this->assertInstanceOf(PreviouslyShown::class, $res->getPreviouslyShown());
        $this->assertInstanceOf(Rating::class, $res->getRatings()[0]);
        $this->assertInstanceOf(Review::class, $res->getReviews()[0]);
        $this->assertInstanceOf(StarRating::class, $res->getStarRatings()[0]);
        $this->assertEquals("showview", $res->getShowView());
        $this->assertEquals("start", $res->getStart());
        $this->assertEquals("stop", $res->getStop());
        $this->assertInstanceOf(SubTitle::class, $res->getSubTitles()[0]);
        $this->assertInstanceOf(Title::class, $res->getTitles()[0]);
        $this->assertInstanceOf(Url::class, $res->getUrls()[0]);
        $this->assertInstanceOf(Video::class, $res->getVideo());
        $this->assertEquals("videoplus", $res->getVideoPlus());
        $this->assertEquals("vps-start", $res->getVpsStart());
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

        $res = ParserHelper::parseQuality($node);
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

        $res = ParserHelper::parseRating($node);
        $this->assertInstanceOf(Rating::class, $res);

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

        $res = ParserHelper::parseReview($node);
        $this->assertInstanceOf(Review::class, $res);

        $this->assertEquals("review-lang", $res->getLang());
        $this->assertEquals("reviewer", $res->getReviewer());
        $this->assertEquals("source", $res->getSource());
        $this->assertEquals("text", $res->getType());
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

        $res = ParserHelper::parseStarRating($node);
        $this->assertInstanceOf(StarRating::class, $res);

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

        $res = ParserHelper::parseStereo($node);
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

        $res = ParserHelper::parseSubTitle($node);
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

        $res = ParserHelper::parseSubtitles($node);
        $this->assertInstanceOf(Subtitles::class, $res);

        $this->assertInstanceOf(Language::class, $res->getLanguage());
        $this->assertEquals("deaf-signed", $res->getType());
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

        $res = ParserHelper::parseTitle($node);
        $this->assertInstanceOf(Title::class, $res);

        $this->assertEquals("Title", $res->getContent());
        $this->assertEquals("title-lang", $res->getLang());
    }

    /**
     * Tests the parseTv() method.
     *
     * @return void
     */
    public function testParseTv() {

        // tv
        $node = $this->document->documentElement;

        $res = ParserHelper::parseTv($node);
        $this->assertInstanceOf(Tv::class, $res);

        $this->assertInstanceOf(Channel::class, $res->getChannels()[0]);
        $this->assertEquals("generator-info-name", $res->getGeneratorInfoName());
        $this->assertEquals("generator-info-url", $res->getGeneratorInfoURL());
        $this->assertInstanceOf(Programme::class, $res->getProgrammes()[0]);
        $this->assertEquals("source-data-url", $res->getSourceDataURL());
        $this->assertEquals("source-info-name", $res->getSourceInfoName());
        $this->assertEquals("source-info-url", $res->getSourceInfoURL());
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

        $res = ParserHelper::parseUrl($node);
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

        $res = ParserHelper::parseValue($node);
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

        $res = ParserHelper::parseVideo($node);
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

        $res = ParserHelper::parseWriter($node);
        $this->assertInstanceOf(Writer::class, $res);

        $this->assertEquals("Writer", $res->getContent());
    }
}
