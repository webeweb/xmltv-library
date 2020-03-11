<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Serializer;

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
use WBW\Library\XMLTV\Model\SecondaryTitle;
use WBW\Library\XMLTV\Model\StarRating;
use WBW\Library\XMLTV\Model\Stereo;
use WBW\Library\XMLTV\Model\Subtitles;
use WBW\Library\XMLTV\Model\Title;
use WBW\Library\XMLTV\Model\Tv;
use WBW\Library\XMLTV\Model\Url;
use WBW\Library\XMLTV\Model\Value;
use WBW\Library\XMLTV\Model\Video;
use WBW\Library\XMLTV\Model\Writer;
use WBW\Library\XMLTV\Serializer\XmlDeserializer;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * XML deserializer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Serializer
 */
class XmlDeserializerTest extends AbstractTestCase {

    /**
     * Tests the deserializeActor() method.
     *
     * @return void
     */
    public function testDeserializeActor() {

        // tv > programme > credits > actor
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(3);

        $res = XmlDeserializer::deserializeActor($node);
        $this->assertInstanceOf(Actor::class, $res);

        $this->assertEquals("Actor", $res->getContent());
        $this->assertEquals("role", $res->getRole());
    }

    /**
     * Tests the deserializeAdapter() method.
     *
     * @return void
     */
    public function testDeserializeAdapter() {

        // tv > programme > credits > adapter
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(7);

        $res = XmlDeserializer::deserializeAdapter($node);
        $this->assertInstanceOf(Adapter::class, $res);

        $this->assertEquals("Adapter", $res->getContent());
    }

    /**
     * Tests the deserializeAspect() method.
     *
     * @return void
     */
    public function testDeserializeAspect() {

        // tv > programme > video > aspect
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(29)
            ->childNodes->item(5);

        $res = XmlDeserializer::deserializeAspect($node);
        $this->assertInstanceOf(Aspect::class, $res);

        $this->assertEquals("Aspect", $res->getContent());
    }

    /**
     * Tests the deserializeAudio() method.
     *
     * @return void
     */
    public function testDeserializeAudio() {

        // tv > programme > audio
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(31);

        $res = XmlDeserializer::deserializeAudio($node);
        $this->assertInstanceOf(Audio::class, $res);

        $this->assertInstanceOf(Present::class, $res->getPresent());
        $this->assertInstanceOf(Stereo::class, $res->getStereo());
    }

    /**
     * Tests the deserializeCategory() method.
     *
     * @return void
     */
    public function testDeserializeCategory() {

        // tv > programme > category
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(11);

        $res = XmlDeserializer::deserializeCategory($node);
        $this->assertInstanceOf(Category::class, $res);

        $this->assertEquals("Category", $res->getContent());
        $this->assertEquals("category-lang", $res->getLang());
    }

    /**
     * Tests the deserializeChannel() method.
     *
     * @return void
     */
    public function testDeserializeChannel() {

        // tv > channel
        $node = $this->document->documentElement
            ->childNodes->item(1);

        $res = XmlDeserializer::deserializeChannel($node);
        $this->assertInstanceOf(Channel::class, $res);

        $this->assertInstanceOf(DisplayName::class, $res->getDisplayNames()[0]);
        $this->assertInstanceOf(Icon::class, $res->getIcons()[0]);
        $this->assertInstanceOf(Url::class, $res->getUrls()[0]);
    }

    /**
     * Tests the deserializeColour() method.
     *
     * @return void
     */
    public function testDeserializeColour() {

        // tv > programme > video > colour
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(29)
            ->childNodes->item(3);

        $res = XmlDeserializer::deserializeColour($node);
        $this->assertInstanceOf(Colour::class, $res);

        $this->assertEquals("Colour", $res->getContent());
    }

    /**
     * Tests the deserializeCommentator() method.
     *
     * @return void
     */
    public function testDeserializeCommentator() {

        // tv > programme > credits > commentator
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(17);

        $res = XmlDeserializer::deserializeCommentator($node);
        $this->assertInstanceOf(Commentator::class, $res);

        $this->assertEquals("Commentator", $res->getContent());
    }

    /**
     * Tests the deserializeComposer() method.
     *
     * @return void
     */
    public function testDeserializeComposer() {

        // tv > programme > credits > composer
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(11);

        $res = XmlDeserializer::deserializeComposer($node);
        $this->assertInstanceOf(Composer::class, $res);

        $this->assertEquals("Composer", $res->getContent());
    }

    /**
     * Tests the deserializeCountry() method.
     *
     * @return void
     */
    public function testDeserializeCountry() {

        // tv > programme > country
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(25);

        $res = XmlDeserializer::deserializeCountry($node);
        $this->assertInstanceOf(Country::class, $res);

        $this->assertEquals("Country", $res->getContent());
        $this->assertEquals("country-lang", $res->getLang());
    }

    /**
     * Tests the deserializeCredits() method.
     *
     * @return void
     */
    public function testDeserializeCredits() {

        // tv > programme > credits
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7);

        $res = XmlDeserializer::deserializeCredits($node);
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
     * Tests the deserializeDate() method.
     *
     * @return void
     */
    public function testDeserializeDate() {

        // tv > programme > date
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(9);

        $res = XmlDeserializer::deserializeDate($node);
        $this->assertInstanceOf(Date::class, $res);

        $this->assertEquals(1970, $res->getContent());
    }

    /**
     * Tests the deserializeDesc() method.
     *
     * @return void
     */
    public function testDeserializeDesc() {

        // tv > programme > desc
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(5);

        $res = XmlDeserializer::deserializeDesc($node);
        $this->assertInstanceOf(Desc::class, $res);

        $this->assertEquals("Desc", $res->getContent());
        $this->assertEquals("desc-lang", $res->getLang());
    }

    /**
     * Tests the deserializeDirector() method.
     *
     * @return void
     */
    public function testDeserializeDirector() {

        // tv > programme > credits > director
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(1);

        $res = XmlDeserializer::deserializeDirector($node);
        $this->assertInstanceOf(Director::class, $res);

        $this->assertEquals("Director", $res->getContent());
    }

    /**
     * Tests the deserializeDisplayName() method.
     *
     * @return void
     */
    public function testDeserializeDisplayName() {

        // tv > channel > display-name
        $node = $this->document->documentElement
            ->childNodes->item(1)
            ->childNodes->item(1);

        $res = XmlDeserializer::deserializeDisplayName($node);
        $this->assertInstanceOf(DisplayName::class, $res);

        $this->assertEquals("Display name", $res->getContent());
        $this->assertEquals("display-name-lang", $res->getLang());
    }

    /**
     * Tests the deserializeEditor() method.
     *
     * @return void
     */
    public function testDeserializeEditor() {

        // tv > programme > credits > editor
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(13);

        $res = XmlDeserializer::deserializeEditor($node);
        $this->assertInstanceOf(Editor::class, $res);

        $this->assertEquals("Editor", $res->getContent());
    }

    /**
     * Tests the deserializeEpisodeNum() method.
     *
     * @return void
     */
    public function testDeserializeEpisodeNum() {

        // tv > programme > episode-num
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(27);

        $res = XmlDeserializer::deserializeEpisodeNum($node);
        $this->assertInstanceOf(EpisodeNum::class, $res);

        $this->assertEquals("Episode num", $res->getContent());
        $this->assertEquals("onscreen", $res->getSystem());
    }

    /**
     * Tests the deserializeGuest() method.
     *
     * @return void
     */
    public function testDeserializeGuest() {

        // tv > programme > credits > guest
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(19);

        $res = XmlDeserializer::deserializeGuest($node);
        $this->assertInstanceOf(Guest::class, $res);

        $this->assertEquals("Guest", $res->getContent());
    }

    /**
     * Tests the deserializeIcon() method.
     *
     * @return void
     */
    public function testDeserializeIcon() {

        // tv > channel > icon
        $node = $this->document->documentElement
            ->childNodes->item(1)
            ->childNodes->item(3);

        $res = XmlDeserializer::deserializeIcon($node);
        $this->assertInstanceOf(Icon::class, $res);

        $this->assertEquals(1080, $res->getHeight());
        $this->assertEquals("src", $res->getSrc());
        $this->assertEquals(1920, $res->getWidth());
    }

    /**
     * Tests the deserializeKeyword() method.
     *
     * @return void
     */
    public function testDeserializeKeyword() {

        // tv > programme > keyword
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(13);

        $res = XmlDeserializer::deserializeKeyword($node);
        $this->assertInstanceOf(Keyword::class, $res);

        $this->assertEquals("Keyword", $res->getContent());
        $this->assertEquals("keyword-lang", $res->getLang());
    }

    /**
     * Tests the deserializeLanguage() method.
     *
     * @return void
     */
    public function testDeserializeLanguage() {

        // tv > programme > language
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(15);

        $res = XmlDeserializer::deserializeLanguage($node);
        $this->assertInstanceOf(Language::class, $res);

        $this->assertEquals("Language", $res->getContent());
        $this->assertEquals("language-lang", $res->getLang());
    }

    /**
     * Tests the deserializeLastChance() method.
     *
     * @return void
     */
    public function testDeserializeLastChance() {

        // tv > programme > last-chance
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(37);

        $res = XmlDeserializer::deserializeLastChance($node);
        $this->assertInstanceOf(LastChance::class, $res);

        $this->assertEquals("Last chance", $res->getContent());
        $this->assertEquals("last-chance-lang", $res->getLang());
    }

    /**
     * Tests the deserializeLength() method.
     *
     * @return void
     */
    public function testDeserializeLength() {

        // tv > programme > length
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(19);

        $res = XmlDeserializer::deserializeLength($node);
        $this->assertInstanceOf(Length::class, $res);

        $this->assertEquals(90, $res->getContent());
        $this->assertEquals("minutes", $res->getUnits());
    }

    /**
     * Tests the deserializeOrigLanguage() method.
     *
     * @return void
     */
    public function testDeserializeOrigLanguage() {

        // tv > programme > orig-language
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(17);

        $res = XmlDeserializer::deserializeOrigLanguage($node);
        $this->assertInstanceOf(OrigLanguage::class, $res);

        $this->assertEquals("Orig language", $res->getContent());
        $this->assertEquals("orig-language-lang", $res->getLang());
    }

    /**
     * Tests the deserializePremiere() method.
     *
     * @return void
     */
    public function testDeserializePremiere() {

        // tv > programme > premiere
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(35);

        $res = XmlDeserializer::deserializePremiere($node);
        $this->assertInstanceOf(Premiere::class, $res);

        $this->assertEquals("Premiere", $res->getContent());
        $this->assertEquals("premiere-lang", $res->getLang());
    }

    /**
     * Tests the deserializePresent() method.
     *
     * @return void
     */
    public function testDeserializePresent() {

        // tv > programme > video > present
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(29)
            ->childNodes->item(1);

        $res = XmlDeserializer::deserializePresent($node);
        $this->assertInstanceOf(Present::class, $res);

        $this->assertEquals("Present", $res->getContent());
    }

    /**
     * Tests the deserializePresenter() method.
     *
     * @return void
     */
    public function testDeserializePresenter() {

        // tv > programme > credits > presenter
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(15);

        $res = XmlDeserializer::deserializePresenter($node);
        $this->assertInstanceOf(Presenter::class, $res);

        $this->assertEquals("Presenter", $res->getContent());
    }

    /**
     * Tests the deserializePreviouslyShown() method.
     *
     * @return void
     */
    public function testDeserializePreviouslyShown() {

        // tv > programme > previously-shown
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(33);

        $res = XmlDeserializer::deserializePreviouslyShown($node);
        $this->assertInstanceOf(PreviouslyShown::class, $res);

        $this->assertEquals("channel-id", $res->getChannel());
        $this->assertEquals("previously-shown-start", $res->getStart());
    }

    /**
     * Tests the deserializeProducer() method.
     *
     * @return void
     */
    public function testDeserializeProducer() {

        // tv > programme > credits > producer
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(9);

        $res = XmlDeserializer::deserializeProducer($node);
        $this->assertInstanceOf(Producer::class, $res);

        $this->assertEquals("Producer", $res->getContent());
    }

    /**
     * Tests the deserializeProgramme() method.
     *
     * @return void
     */
    public function testDeserializeProgramme() {

        // tv > programme
        $node = $this->document->documentElement
            ->childNodes->item(3);

        $res = XmlDeserializer::deserializeProgramme($node);
        $this->assertInstanceOf(Programme::class, $res);

        $this->assertInstanceOf(Audio::class, $res->getAudio());
        $this->assertInstanceOf(Category::class, $res->getCategories()[0]);
        $this->assertEquals("channel-id", $res->getChannel());
        $this->assertEquals("clumpidx", $res->getClumpIdx());
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
        $this->assertInstanceOf(OrigLanguage::class, $res->getOrigLanguage());
        $this->assertTrue($res->getNew());
        $this->assertEquals("20190730200000 +0100", $res->getPdcStart());
        $this->assertInstanceOf(Premiere::class, $res->getPremiere());
        $this->assertInstanceOf(PreviouslyShown::class, $res->getPreviouslyShown());
        $this->assertInstanceOf(Rating::class, $res->getRatings()[0]);
        $this->assertInstanceOf(Review::class, $res->getReviews()[0]);
        $this->assertInstanceOf(SecondaryTitle::class, $res->getSecondaryTitles()[0]);
        $this->assertInstanceOf(StarRating::class, $res->getStarRatings()[0]);
        $this->assertEquals("showview", $res->getShowView());
        $this->assertEquals("20190730200000 +0200", $res->getStart());
        $this->assertEquals("20190730220000 +0200", $res->getStop());
        $this->assertInstanceOf(Subtitles::class, $res->getSubtitles()[0]);
        $this->assertInstanceOf(Title::class, $res->getTitles()[0]);
        $this->assertInstanceOf(Url::class, $res->getUrls()[0]);
        $this->assertInstanceOf(Video::class, $res->getVideo());
        $this->assertEquals("videoplus", $res->getVideoPlus());
        $this->assertEquals("20190730200000 -0100", $res->getVpsStart());
    }

    /**
     * Tests the deserializeQuality() method.
     *
     * @return void
     */
    public function testDeserializeQuality() {

        // tv > programme > video > quality
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(29)
            ->childNodes->item(7);

        $res = XmlDeserializer::deserializeQuality($node);
        $this->assertInstanceOf(Quality::class, $res);

        $this->assertEquals("Quality", $res->getContent());
    }

    /**
     * Tests the deserializeRating() method.
     *
     * @return void
     */
    public function testDeserializeRating() {

        // tv > programme > rating
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(43);

        $res = XmlDeserializer::deserializeRating($node);
        $this->assertInstanceOf(Rating::class, $res);

        $this->assertInstanceOf(Icon::class, $res->getIcons()[0]);
        $this->assertEquals("rating-system", $res->getSystem());
        $this->assertInstanceOf(Value::class, $res->getValue());
    }

    /**
     * Tests the deserializeReview() method.
     *
     * @return void
     */
    public function testDeserializeReview() {

        // tv > programme > review
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(47);

        $res = XmlDeserializer::deserializeReview($node);
        $this->assertInstanceOf(Review::class, $res);

        $this->assertEquals("review-lang", $res->getLang());
        $this->assertEquals("reviewer", $res->getReviewer());
        $this->assertEquals("source", $res->getSource());
        $this->assertEquals("text", $res->getType());
    }

    /**
     * Tests the deserializeSecondaryTitle() method.
     *
     * @return void
     */
    public function testDeserializeSecondaryTitle() {

        // tv > programme > sub-title
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(3);

        $res = XmlDeserializer::deserializeSecondaryTitle($node);
        $this->assertInstanceOf(SecondaryTitle::class, $res);

        $this->assertEquals("Secondary title", $res->getContent());
        $this->assertEquals("secondary-title-lang", $res->getLang());
    }

    /**
     * Tests the deserializeStarRating() method.
     *
     * @return void
     */
    public function testDeserializeStarRating() {

        // tv > programme > star-rating
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(45);

        $res = XmlDeserializer::deserializeStarRating($node);
        $this->assertInstanceOf(StarRating::class, $res);

        $this->assertInstanceOf(Icon::class, $res->getIcons()[0]);
        $this->assertInstanceOf(Value::class, $res->getValue());
    }

    /**
     * Tests the deserializeStereo() method.
     *
     * @return void
     */
    public function testDeserializeStereo() {

        // tv > programme > audio > stereo
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(31)
            ->childNodes->item(3);

        $res = XmlDeserializer::deserializeStereo($node);
        $this->assertInstanceOf(Stereo::class, $res);

        $this->assertEquals("Stereo", $res->getContent());
    }

    /**
     * Tests the deserializeSubtitles() method.
     *
     * @return void
     */
    public function testDeserializeSubtitles() {

        // tv > programme > subtitles
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(41);

        $res = XmlDeserializer::deserializeSubtitles($node);
        $this->assertInstanceOf(Subtitles::class, $res);

        $this->assertInstanceOf(Language::class, $res->getLanguage());
        $this->assertEquals("deaf-signed", $res->getType());
    }

    /**
     * Tests the deserializeTitle() method.
     *
     * @return void
     */
    public function testDeserializeTitle() {

        // tv > programme > title
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(1);

        $res = XmlDeserializer::deserializeTitle($node);
        $this->assertInstanceOf(Title::class, $res);

        $this->assertEquals("Title", $res->getContent());
        $this->assertEquals("title-lang", $res->getLang());
    }

    /**
     * Tests the deserializeTv() method.
     *
     * @return void
     */
    public function testDeserializeTv() {

        // tv
        $node = $this->document->documentElement;

        $res = XmlDeserializer::deserializeTv($node);
        $this->assertInstanceOf(Tv::class, $res);

        $this->assertInstanceOf(Channel::class, $res->getChannels()[0]);
        $this->assertEquals("generator-info-name", $res->getGeneratorInfoName());
        $this->assertEquals("generator-info-url", $res->getGeneratorInfoUrl());
        $this->assertInstanceOf(Programme::class, $res->getProgrammes()[0]);
        $this->assertEquals("source-data-url", $res->getSourceDataUrl());
        $this->assertEquals("source-info-name", $res->getSourceInfoName());
        $this->assertEquals("source-info-url", $res->getSourceInfoUrl());
    }

    /**
     * Tests the deserializeUrl() method.
     *
     * @return void
     */
    public function testDeserializeUrl() {

        // tv > channel > url
        $node = $this->document->documentElement
            ->childNodes->item(1)
            ->childNodes->item(5);

        $res = XmlDeserializer::deserializeUrl($node);
        $this->assertInstanceOf(Url::class, $res);

        $this->assertEquals("URL", $res->getContent());
    }

    /**
     * Tests the deserializeValue() method.
     *
     * @return void
     */
    public function testDeserializeValue() {

        // tv > programme > rating > value
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(43)
            ->childNodes->item(1);

        $res = XmlDeserializer::deserializeValue($node);
        $this->assertInstanceOf(Value::class, $res);

        $this->assertEquals("Value", $res->getContent());
    }

    /**
     * Tests the deserializeVideo() method.
     *
     * @return void
     */
    public function testDeserializeVideo() {

        // tv > programme > video
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(29);

        $res = XmlDeserializer::deserializeVideo($node);
        $this->assertInstanceOf(Video::class, $res);

        $this->assertInstanceOf(Aspect::class, $res->getAspect());
        $this->assertInstanceOf(Colour::class, $res->getColour());
        $this->assertInstanceOf(Present::class, $res->getPresent());
        $this->assertInstanceOf(Quality::class, $res->getQuality());
    }

    /**
     * Tests the deserializeWriter() method.
     *
     * @return void
     */
    public function testDeserializeWriter() {

        // tv > programme > credits > writer
        $node = $this->document->documentElement
            ->childNodes->item(3)
            ->childNodes->item(7)
            ->childNodes->item(5);

        $res = XmlDeserializer::deserializeWriter($node);
        $this->assertInstanceOf(Writer::class, $res);

        $this->assertEquals("Writer", $res->getContent());
    }
}
