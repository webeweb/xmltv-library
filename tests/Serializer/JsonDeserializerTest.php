<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2020 WEBEWEB
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
use WBW\Library\XMLTV\Serializer\JsonDeserializer;
use WBW\Library\XMLTV\Serializer\XmlDeserializer;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * JSON deserializer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Serializer
 */
class JsonDeserializerTest extends AbstractTestCase {

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set the TV mock.
        $this->tv = XmlDeserializer::deserializeTv($this->document->documentElement);
    }

    /**
     * Tests the deserializeActor() method.
     *
     * @return void
     */
    public function testDeserializeActor(): void {

        // tv > programme > credits > actor
        $data = json_encode($this->tv->getProgrammes()[0]->getCredits()->getActors()[0]);

        $res = JsonDeserializer::deserializeActor(json_decode($data, true));
        $this->assertInstanceOf(Actor::class, $res);

        $this->assertEquals("role", $res->getRole());
        $this->assertEquals("Actor", $res->getContent());
    }

    /**
     * /**
     * Tests the deserializeAdapter() method.
     *
     * @return void
     */
    public function testDeserializeAdapter(): void {

        // tv > programme > credits > adapter
        $data = json_encode($this->tv->getProgrammes()[0]->getCredits()->getAdapters()[0]);

        $res = JsonDeserializer::deserializeAdapter(json_decode($data, true));
        $this->assertInstanceOf(Adapter::class, $res);

        $this->assertEquals("Adapter", $res->getContent());
    }

    /**
     * /**
     * Tests the deserializeAspect() method.
     *
     * @return void
     */
    public function testDeserializeAspect(): void {

        // tv > programme > video > aspect
        $data = json_encode($this->tv->getProgrammes()[0]->getVideo()->getAspect());

        $res = JsonDeserializer::deserializeAspect(json_decode($data, true));
        $this->assertInstanceOf(Aspect::class, $res);

        $this->assertEquals("Aspect", $res->getContent());
    }

    /**
     * /**
     * Tests the deserializeAudio() method.
     *
     * @return void
     */
    public function testDeserializeAudio(): void {

        // tv > programme > audio
        $data = json_encode($this->tv->getProgrammes()[0]->getAudio());

        $res = JsonDeserializer::deserializeAudio(json_decode($data, true));
        $this->assertInstanceOf(Audio::class, $res);

        $this->assertInstanceOf(Present::class, $res->getPresent());
        $this->assertInstanceOf(Stereo::class, $res->getStereo());
    }

    /**
     * /**
     * Tests the deserializeCategory() method.
     *
     * @return void
     */
    public function testDeserializeCategory(): void {

        // tv > programme > category
        $data = json_encode($this->tv->getProgrammes()[0]->getCategories()[0]);

        $res = JsonDeserializer::deserializeCategory(json_decode($data, true));
        $this->assertInstanceOf(Category::class, $res);

        $this->assertEquals("category-lang", $res->getLang());
        $this->assertEquals("Category", $res->getContent());
    }

    /**
     * Tests the deserializeChannel() method.
     *
     * @return void
     */
    public function testDeserializeChannel(): void {

        // tv > channel
        $data = json_encode($this->tv->getChannels()[0]);

        $res = JsonDeserializer::deserializeChannel(json_decode($data, true));
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
    public function testDeserializeColour(): void {

        // tv > programme > video > colour
        $data = json_encode($this->tv->getProgrammes()[0]->getVideo()->getColour());

        $res = JsonDeserializer::deserializeColour(json_decode($data, true));
        $this->assertInstanceOf(Colour::class, $res);

        $this->assertEquals("Colour", $res->getContent());
    }

    /**
     * Tests the deserializeCommentator() method.
     *
     * @return void
     */
    public function testDeserializeCommentator(): void {

        // tv > programme > credits > commentator
        $data = json_encode($this->tv->getProgrammes()[0]->getCredits()->getCommentators()[0]);

        $res = JsonDeserializer::deserializeCommentator(json_decode($data, true));
        $this->assertInstanceOf(Commentator::class, $res);

        $this->assertEquals("Commentator", $res->getContent());
    }

    /**
     * Tests the deserializeComposer() method.
     *
     * @return void
     */
    public function testDeserializeComposer(): void {

        // tv > programme > credits > composer
        $data = json_encode($this->tv->getProgrammes()[0]->getCredits()->getComposers()[0]);

        $res = JsonDeserializer::deserializeComposer(json_decode($data, true));
        $this->assertInstanceOf(Composer::class, $res);

        $this->assertEquals("Composer", $res->getContent());
    }

    /**
     * Tests the deserializeCountry() method.
     *
     * @return void
     */
    public function testDeserializeCountry(): void {

        // tv > programme > country
        $data = json_encode($this->tv->getProgrammes()[0]->getCountries()[0]);

        $res = JsonDeserializer::deserializeCountry(json_decode($data, true));
        $this->assertInstanceOf(Country::class, $res);

        $this->assertEquals("country-lang", $res->getLang());
        $this->assertEquals("Country", $res->getContent());
    }

    /**
     * Tests the deserializeCredits() method.
     *
     * @return void
     */
    public function testDeserializeCredits(): void {

        // tv > programme > credits
        $data = json_encode($this->tv->getProgrammes()[0]->getCredits());

        $res = JsonDeserializer::deserializeCredits(json_decode($data, true));
        $this->assertInstanceOf(Credits::class, $res);

        $this->assertInstanceOf(Director::class, $res->getDirectors()[0]);
        $this->assertInstanceOf(Actor::class, $res->getActors()[0]);
        $this->assertInstanceOf(Writer::class, $res->getWriters()[0]);
        $this->assertInstanceOf(Adapter::class, $res->getAdapters()[0]);
        $this->assertInstanceOf(Producer::class, $res->getProducers()[0]);
        $this->assertInstanceOf(Composer::class, $res->getComposers()[0]);
        $this->assertInstanceOf(Editor::class, $res->getEditors()[0]);
        $this->assertInstanceOf(Presenter::class, $res->getPresenters()[0]);
        $this->assertInstanceOf(Commentator::class, $res->getCommentators()[0]);
        $this->assertInstanceOf(Guest::class, $res->getGuests()[0]);
    }

    /**
     * Tests the deserializeDate() method.
     *
     * @return void
     */
    public function testDeserializeDate(): void {

        // tv > programme > date
        $data = json_encode($this->tv->getProgrammes()[0]->getDate());

        $res = JsonDeserializer::deserializeDate(json_decode($data, true));
        $this->assertInstanceOf(Date::class, $res);

        $this->assertEquals(1970, $res->getContent());
    }

    /**
     * Tests the deserializeDesc() method.
     *
     * @return void
     */
    public function testDeserializeDesc(): void {

        // tv > programme > desc
        $data = json_encode($this->tv->getProgrammes()[0]->getDescs()[0]);

        $res = JsonDeserializer::deserializeDesc(json_decode($data, true));
        $this->assertInstanceOf(Desc::class, $res);

        $this->assertEquals("desc-lang", $res->getLang());
        $this->assertEquals("Desc", $res->getContent());
    }

    /**
     * Tests the deserializeDirector() method.
     *
     * @return void
     */
    public function testDeserializeDirector(): void {

        // tv > programme > credits > director
        $data = json_encode($this->tv->getProgrammes()[0]->getCredits()->getDirectors()[0]);

        $res = JsonDeserializer::deserializeDirector(json_decode($data, true));
        $this->assertInstanceOf(Director::class, $res);

        $this->assertEquals("Director", $res->getContent());
    }

    /**
     * Tests the deserializeDisplayName() method.
     *
     * @return void
     */
    public function testDeserializeDisplayName(): void {

        // tv > channel > display-name
        $data = json_encode($this->tv->getChannels()[0]->getDisplayNames()[0]);

        $res = JsonDeserializer::deserializeDisplayName(json_decode($data, true));
        $this->assertInstanceOf(DisplayName::class, $res);

        $this->assertEquals("display-name-lang", $res->getLang());
        $this->assertEquals("Display name", $res->getContent());
    }

    /**
     * Tests the deserializeEditor() method.
     *
     * @return void
     */
    public function testDeserializeEditor(): void {

        // tv > programme > credits > editor
        $data = json_encode($this->tv->getProgrammes()[0]->getCredits()->getEditors()[0]);

        $res = JsonDeserializer::deserializeEditor(json_decode($data, true));
        $this->assertInstanceOf(Editor::class, $res);

        $this->assertEquals("Editor", $res->getContent());
    }

    /**
     * Tests the deserializeEpisodeNum() method.
     *
     * @return void
     */
    public function testDeserializeEpisodeNum(): void {

        // tv > programme > episode-num
        $data = json_encode($this->tv->getProgrammes()[0]->getEpisodeNums()[0]);

        $res = JsonDeserializer::deserializeEpisodeNum(json_decode($data, true));
        $this->assertInstanceOf(EpisodeNum::class, $res);

        $this->assertEquals("onscreen", $res->getSystem());
        $this->assertEquals("Episode num", $res->getContent());
    }

    /**
     * Tests the deserializeGuest() method.
     *
     * @return void
     */
    public function testDeserializeGuest(): void {

        // tv > programme > credits > guest
        $data = json_encode($this->tv->getProgrammes()[0]->getCredits()->getGuests()[0]);

        $res = JsonDeserializer::deserializeGuest(json_decode($data, true));
        $this->assertInstanceOf(Guest::class, $res);

        $this->assertEquals("Guest", $res->getContent());
    }

    /**
     * /**
     * Tests the deserializeIcon() method.
     *
     * @return void
     */
    public function testDeserializeIcon(): void {

        // tv > channel > icon
        $data = json_encode($this->tv->getChannels()[0]->getIcons()[0]);

        $res = JsonDeserializer::deserializeIcon(json_decode($data, true));
        $this->assertInstanceOf(Icon::class, $res);

        $this->assertEquals("src", $res->getSrc());
        $this->assertEquals(1920, $res->getWidth());
        $this->assertEquals(1080, $res->getHeight());
    }

    /**
     * Tests the deserializeKeyword() method.
     *
     * @return void
     */
    public function testDeserializeKeyword(): void {

        // tv > programme > keyword
        $data = json_encode($this->tv->getProgrammes()[0]->getKeywords()[0]);

        $res = JsonDeserializer::deserializeKeyword(json_decode($data, true));
        $this->assertInstanceOf(Keyword::class, $res);

        $this->assertEquals("keyword-lang", $res->getLang());
        $this->assertEquals("Keyword", $res->getContent());
    }

    /**
     * Tests the deserializeLanguage() method.
     *
     * @return void
     */
    public function testDeserializeLanguage(): void {

        // tv > programme > language
        $data = json_encode($this->tv->getProgrammes()[0]->getLanguage());

        $res = JsonDeserializer::deserializeLanguage(json_decode($data, true));
        $this->assertInstanceOf(Language::class, $res);

        $this->assertEquals("language-lang", $res->getLang());
        $this->assertEquals("Language", $res->getContent());
    }

    /**
     * Tests the deserializeLastChance() method.
     *
     * @return void
     */
    public function testDeserializeLastChance(): void {

        // tv > programme > last-chance
        $data = json_encode($this->tv->getProgrammes()[0]->getLastChance());

        $res = JsonDeserializer::deserializeLastChance(json_decode($data, true));
        $this->assertInstanceOf(LastChance::class, $res);

        $this->assertEquals("last-chance-lang", $res->getLang());
        $this->assertEquals("Last chance", $res->getContent());
    }

    /**
     * Tests the deserializeLength() method.
     *
     * @return void
     */
    public function testDeserializeLength(): void {

        // tv > programme > length
        $data = json_encode($this->tv->getProgrammes()[0]->getLength());

        $res = JsonDeserializer::deserializeLength(json_decode($data, true));
        $this->assertInstanceOf(Length::class, $res);

        $this->assertEquals("minutes", $res->getUnits());
        $this->assertEquals(90, $res->getContent());
    }

    /**
     * Tests the deserializeOrigLanguage() method.
     *
     * @return void
     */
    public function testDeserializeOrigLanguage(): void {

        // tv > programme > orig-language
        $data = json_encode($this->tv->getProgrammes()[0]->getOrigLanguage());

        $res = JsonDeserializer::deserializeOrigLanguage(json_decode($data, true));
        $this->assertInstanceOf(OrigLanguage::class, $res);

        $this->assertEquals("orig-language-lang", $res->getLang());
        $this->assertEquals("Orig language", $res->getContent());
    }

    /**
     * Tests the deserializePremiere() method.
     *
     * @return void
     */
    public function testDeserializePremiere(): void {

        // tv > programme > premiere
        $data = json_encode($this->tv->getProgrammes()[0]->getPremiere());

        $res = JsonDeserializer::deserializePremiere(json_decode($data, true));
        $this->assertInstanceOf(Premiere::class, $res);

        $this->assertEquals("premiere-lang", $res->getLang());
        $this->assertEquals("Premiere", $res->getContent());
    }

    /**
     * Tests the deserializePresent() method.
     *
     * @return void
     */
    public function testDeserializePresent(): void {

        // tv > programme > video > present
        $data = json_encode($this->tv->getProgrammes()[0]->getAudio()->getPresent());

        $res = JsonDeserializer::deserializePresent(json_decode($data, true));
        $this->assertInstanceOf(Present::class, $res);

        $this->assertEquals("Present", $res->getContent());
    }

    /**
     * Tests the deserializePresenter() method.
     *
     * @return void
     */
    public function testDeserializePresenter(): void {

        // tv > programme > credits > presenter
        $data = json_encode($this->tv->getProgrammes()[0]->getCredits()->getPresenters()[0]);

        $res = JsonDeserializer::deserializePresenter(json_decode($data, true));
        $this->assertInstanceOf(Presenter::class, $res);

        $this->assertEquals("Presenter", $res->getContent());
    }

    /**
     * Tests the deserializePreviouslyShown() method.
     *
     * @return void
     */
    public function testDeserializePreviouslyShown(): void {

        // tv > programme > previously-shown
        $data = json_encode($this->tv->getProgrammes()[0]->getPreviouslyShown());

        $res = JsonDeserializer::deserializePreviouslyShown(json_decode($data, true));
        $this->assertInstanceOf(PreviouslyShown::class, $res);

        $this->assertEquals("channel-id", $res->getChannel());
        $this->assertEquals("previously-shown-start", $res->getStart());
    }

    /**
     * Tests the deserializeProducer() method.
     *
     * @return void
     */
    public function testDeserializeProducer(): void {

        // tv > programme > credits > producer
        $data = json_encode($this->tv->getProgrammes()[0]->getCredits()->getProducers()[0]);

        $res = JsonDeserializer::deserializeProducer(json_decode($data, true));
        $this->assertInstanceOf(Producer::class, $res);

        $this->assertEquals("Producer", $res->getContent());
    }

    /**
     * Tests the deserializeProgramme() method.
     *
     * @return void
     */
    public function testDeserializeProgramme(): void {

        // tv > programme
        $data = json_encode($this->tv->getProgrammes()[0]);

        $res = JsonDeserializer::deserializeProgramme(json_decode($data, true));
        $this->assertInstanceOf(Programme::class, $res);

        $this->assertEquals("20190730200000 +0200", $res->getStart());
        $this->assertEquals("20190730220000 +0200", $res->getStop());
        $this->assertEquals("20190730200000 +0100", $res->getPdcStart());
        $this->assertEquals("20190730200000 -0100", $res->getVpsStart());
        $this->assertEquals("showview", $res->getShowView());
        $this->assertEquals("videoplus", $res->getVideoPlus());
        $this->assertEquals("channel-id", $res->getChannel());
        $this->assertEquals("clumpidx", $res->getClumpIdx());
        $this->assertInstanceOf(Title::class, $res->getTitles()[0]);
        $this->assertInstanceOf(SecondaryTitle::class, $res->getSecondaryTitles()[0]);
        $this->assertInstanceOf(Desc::class, $res->getDescs()[0]);
        $this->assertInstanceOf(Credits::class, $res->getCredits());
        $this->assertInstanceOf(Date::class, $res->getDate());
        $this->assertInstanceOf(Category::class, $res->getCategories()[0]);
        $this->assertInstanceOf(Keyword::class, $res->getKeywords()[0]);
        $this->assertInstanceOf(Language::class, $res->getLanguage());
        $this->assertInstanceOf(OrigLanguage::class, $res->getOrigLanguage());
        $this->assertInstanceOf(Length::class, $res->getLength());
        $this->assertInstanceOf(Icon::class, $res->getIcons()[0]);
        $this->assertInstanceOf(Url::class, $res->getUrls()[0]);
        $this->assertCount(1, $res->getCountries());
        $this->assertInstanceOf(Country::class, $res->getCountries()[0]);
        $this->assertInstanceOf(EpisodeNum::class, $res->getEpisodeNums()[0]);
        $this->assertInstanceOf(Video::class, $res->getVideo());
        $this->assertInstanceOf(Audio::class, $res->getAudio());
        $this->assertInstanceOf(PreviouslyShown::class, $res->getPreviouslyShown());
        $this->assertInstanceOf(Premiere::class, $res->getPremiere());
        $this->assertInstanceOf(LastChance::class, $res->getLastChance());
        $this->assertTrue($res->getNew());
        $this->assertInstanceOf(Subtitles::class, $res->getSubtitles()[0]);
        $this->assertInstanceOf(Rating::class, $res->getRatings()[0]);
        $this->assertInstanceOf(StarRating::class, $res->getStarRatings()[0]);
        $this->assertInstanceOf(Review::class, $res->getReviews()[0]);
    }

    /**
     * Tests the deserializeQuality() method.
     *
     * @return void
     */
    public function testDeserializeQuality(): void {

        // tv > programme > video > quality
        $data = json_encode($this->tv->getProgrammes()[0]->getVideo()->getQuality());

        $res = JsonDeserializer::deserializeQuality(json_decode($data, true));
        $this->assertInstanceOf(Quality::class, $res);

        $this->assertEquals("Quality", $res->getContent());
    }

    /**
     * Tests the deserializeRating() method.
     *
     * @return void
     */
    public function testDeserializeRating(): void {

        // tv > programme > rating
        $data = json_encode($this->tv->getProgrammes()[0]->getRatings()[0]);

        $res = JsonDeserializer::deserializeRating(json_decode($data, true));
        $this->assertInstanceOf(Rating::class, $res);

        $this->assertEquals("rating-system", $res->getSystem());
        $this->assertInstanceOf(Value::class, $res->getValue());
        $this->assertInstanceOf(Icon::class, $res->getIcons()[0]);
    }

    /**
     * Tests the deserializeReview() method.
     *
     * @return void
     */
    public function testDeserializeReview(): void {

        // tv > programme > review
        $data = json_encode($this->tv->getProgrammes()[0]->getReviews()[0]);

        $res = JsonDeserializer::deserializeReview(json_decode($data, true));
        $this->assertInstanceOf(Review::class, $res);

        $this->assertEquals("text", $res->getType());
        $this->assertEquals("source", $res->getSource());
        $this->assertEquals("reviewer", $res->getReviewer());
        $this->assertEquals("review-lang", $res->getLang());
    }

    /**
     * Tests the deserializeSecondaryTitle() method.
     *
     * @return void
     */
    public function testDeserializeSecondaryTitle(): void {

        // tv > programme > sub-title
        $data = json_encode($this->tv->getProgrammes()[0]->getSecondaryTitles()[0]);

        $res = JsonDeserializer::deserializeSecondaryTitle(json_decode($data, true));
        $this->assertInstanceOf(SecondaryTitle::class, $res);

        $this->assertEquals("secondary-title-lang", $res->getLang());
        $this->assertEquals("Secondary title", $res->getContent());
    }

    /**
     * Tests the deserializeStarRating() method.
     *
     * @return void
     */
    public function testDeserializeStarRating(): void {

        // tv > programme > star-rating
        $data = json_encode($this->tv->getProgrammes()[0]->getStarRatings()[0]);

        $res = JsonDeserializer::deserializeStarRating(json_decode($data, true));
        $this->assertInstanceOf(StarRating::class, $res);

        $this->assertInstanceOf(Value::class, $res->getValue());
        $this->assertInstanceOf(Icon::class, $res->getIcons()[0]);
    }

    /**
     * Tests the deserializeStereo() method.
     *
     * @return void
     */
    public function testDeserializeStereo(): void {

        // tv > programme > audio > stereo
        $data = json_encode($this->tv->getProgrammes()[0]->getAudio()->getStereo());

        $res = JsonDeserializer::deserializeStereo(json_decode($data, true));
        $this->assertInstanceOf(Stereo::class, $res);

        $this->assertEquals("Stereo", $res->getContent());
    }

    /**
     * Tests the deserializeSubtitles() method.
     *
     * @return void
     */
    public function testDeserializeSubtitles(): void {

        // tv > programme > subtitles
        $data = json_encode($this->tv->getProgrammes()[0]->getSubtitles()[0]);

        $res = JsonDeserializer::deserializeSubtitles(json_decode($data, true));
        $this->assertInstanceOf(Subtitles::class, $res);

        $this->assertEquals("deaf-signed", $res->getType());
        $this->assertInstanceOf(Language::class, $res->getLanguage());
    }

    /**
     * Tests the deserializeTitle() method.
     *
     * @return void
     */
    public function testDeserializeTitle(): void {

        // tv > programme > title
        $data = json_encode($this->tv->getProgrammes()[0]->getTitles()[0]);

        $res = JsonDeserializer::deserializeTitle(json_decode($data, true));
        $this->assertInstanceOf(Title::class, $res);

        $this->assertEquals("title-lang", $res->getLang());
        $this->assertEquals("Title", $res->getContent());
    }

    /**
     * Tests the deserializeTv() method.
     *
     * @return void
     */
    public function testDeserializeTv(): void {

        // tv
        $data = json_encode($this->tv);

        $res = JsonDeserializer::deserializeTv(json_decode($data, true));
        $this->assertInstanceOf(Tv::class, $res);

        $this->assertEquals("date", $res->getDate());
        $this->assertEquals("generator-info-name", $res->getGeneratorInfoName());
        $this->assertEquals("generator-info-url", $res->getGeneratorInfoUrl());
        $this->assertEquals("source-data-url", $res->getSourceDataUrl());
        $this->assertEquals("source-info-name", $res->getSourceInfoName());
        $this->assertEquals("source-info-url", $res->getSourceInfoUrl());
        $this->assertInstanceOf(Channel::class, $res->getChannels()[0]);
        $this->assertInstanceOf(Programme::class, $res->getProgrammes()[0]);
    }

    /**
     * Tests the deserializeUrl() method.
     *
     * @return void
     */
    public function testDeserializeUrl(): void {

        // tv > channel > url
        $data = json_encode($this->tv->getChannels()[0]->getUrls()[0]);

        $res = JsonDeserializer::deserializeUrl(json_decode($data, true));
        $this->assertInstanceOf(Url::class, $res);

        $this->assertEquals("URL", $res->getContent());
    }

    /**
     * Tests the deserializeValue() method.
     *
     * @return void
     */
    public function testDeserializeValue(): void {

        // tv > programme > rating > value
        $data = json_encode($this->tv->getProgrammes()[0]->getRatings()[0]->getValue());

        $res = JsonDeserializer::deserializeValue(json_decode($data, true));
        $this->assertInstanceOf(Value::class, $res);

        $this->assertEquals("Value", $res->getContent());
    }

    /**
     * Tests the deserializeVideo() method.
     *
     * @return void
     */
    public function testDeserializeVideo(): void {

        // tv > programme > video
        $data = json_encode($this->tv->getProgrammes()[0]->getVideo());

        $res = JsonDeserializer::deserializeVideo(json_decode($data, true));
        $this->assertInstanceOf(Video::class, $res);

        $this->assertInstanceOf(Present::class, $res->getPresent());
        $this->assertInstanceOf(Colour::class, $res->getColour());
        $this->assertInstanceOf(Aspect::class, $res->getAspect());
        $this->assertInstanceOf(Quality::class, $res->getQuality());
    }

    /**
     * Tests the deserializeWriter() method.
     *
     * @return void
     */
    public function testDeserializeWriter(): void {

        // tv > programme > credits > writer
        $data = json_encode($this->tv->getProgrammes()[0]->getCredits()->getWriters()[0]);

        $res = JsonDeserializer::deserializeWriter(json_decode($data, true));
        $this->assertInstanceOf(Writer::class, $res);

        $this->assertEquals("Writer", $res->getContent());
    }
}