<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Serializer;

use DOMNode;
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

/**
 * XML deserializer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Serializer
 */
class XmlDeserializer {

    /**
     * Deserialize an actor node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Actor Returns the actor.
     */
    public static function deserializeActor(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Actor();
        $model->setRole(SerializerHelper::getDOMAttributeValue($domNode, "role"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize an adapter node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Adapter Returns the adapter.
     */
    public static function deserializeAdapter(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Adapter();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize an aspect node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Aspect Returns the aspect.
     */
    public static function deserializeAspect(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Aspect();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize an audio node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Audio Returns the audio.
     */
    public static function deserializeAudio(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Audio();

        SerializerHelper::deserializeChildNode($domNode, Present::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, Stereo::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a category node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Category Returns the category.
     */
    public static function deserializeCategory(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Category();
        $model->setLang(SerializerHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a channel node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Channel Returns the channel.
     */
    public static function deserializeChannel(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Channel();
        $model->setId(SerializerHelper::getDOMAttributeValue($domNode, "id"));

        SerializerHelper::deserializeChildNodes($domNode, DisplayName::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Icon::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Url::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a colour node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Colour Returns the colour.
     */
    public static function deserializeColour(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Colour();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a commentator node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Commentator Returns the commentator.
     */
    public static function deserializeCommentator(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Commentator();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a composer node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Composer Returns the composer.
     */
    public static function deserializeComposer(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Composer();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a country node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Country Returns the country.
     */
    public static function deserializeCountry(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Country();
        $model->setLang(SerializerHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a credits node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Credits Returns the credits.
     */
    public static function deserializeCredits(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Credits();

        SerializerHelper::deserializeChildNodes($domNode, Director::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Actor::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Writer::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Adapter::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Producer::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Composer::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Editor::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Presenter::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Commentator::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Guest::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a date node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Date Returns the date.
     */
    public static function deserializeDate(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Date();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a description node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Desc Returns the description.
     */
    public static function deserializeDesc(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Desc();
        $model->setLang(SerializerHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a director node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Director Returns the director.
     */
    public static function deserializeDirector(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Director();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a display name node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return DisplayName Returns the display name.
     */
    public static function deserializeDisplayName(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new DisplayName();
        $model->setLang(SerializerHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize an editor node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Editor Returns the editor.
     */
    public static function deserializeEditor(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Editor();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a episode number node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return EpisodeNum Returns the episode number.
     */
    public static function deserializeEpisodeNum(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new EpisodeNum();
        $model->setSystem(SerializerHelper::getDOMAttributeValue($domNode, "system"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a guest node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Guest Returns the guest.
     */
    public static function deserializeGuest(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Guest();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize an icon node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Icon Returns the icon.
     */
    public static function deserializeIcon(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Icon();
        $model->setSrc(SerializerHelper::getDOMAttributeValue($domNode, "src"));
        $model->setWidth(SerializerHelper::getDOMAttributeValue($domNode, "width"));
        $model->setHeight(SerializerHelper::getDOMAttributeValue($domNode, "height"));

        return $model;
    }

    /**
     * Deserialize a keyword node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Keyword Returns the keyword.
     */
    public static function deserializeKeyword(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Keyword();
        $model->setLang(SerializerHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a language node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Language Returns the language.
     */
    public static function deserializeLanguage(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Language();
        $model->setLang(SerializerHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a last chance node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return LastChance Returns the last chance.
     */
    public static function deserializeLastChance(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new LastChance();
        $model->setLang(SerializerHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a length node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Length Returns the length.
     */
    public static function deserializeLength(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Length();
        $model->setUnits(SerializerHelper::getDOMAttributeValue($domNode, "units"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize an original language node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return OrigLanguage Returns the original language.
     */
    public static function deserializeOrigLanguage(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new OrigLanguage();
        $model->setLang(SerializerHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a premiere node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Premiere Returns the premiere.
     */
    public static function deserializePremiere(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Premiere();
        $model->setLang(SerializerHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a present node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Present Returns the present.
     */
    public static function deserializePresent(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Present();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a presenter node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Presenter Returns the presenter.
     */
    public static function deserializePresenter(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Presenter();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a previously shown node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return PreviouslyShown Returns the previously shown.
     */
    public static function deserializePreviouslyShown(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new PreviouslyShown();
        $model->setChannel(SerializerHelper::getDOMAttributeValue($domNode, "channel"));
        $model->setStart(SerializerHelper::getDOMAttributeValue($domNode, "start"));

        return $model;
    }

    /**
     * Deserialize a producer node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Producer Returns the producer.
     */
    public static function deserializeProducer(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Producer();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a programme node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Programme Returns the programme.
     */
    public static function deserializeProgramme(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $newNode = SerializerHelper::getDOMNodeByName("new", $domNode->childNodes);

        $model = new Programme();
        $model->setStart(SerializerHelper::getDOMAttributeValue($domNode, "start"));
        $model->setStop(SerializerHelper::getDOMAttributeValue($domNode, "stop"));
        $model->setPdcStart(SerializerHelper::getDOMAttributeValue($domNode, "pdc-start"));
        $model->setVpsStart(SerializerHelper::getDOMAttributeValue($domNode, "vps-start"));
        $model->setShowView(SerializerHelper::getDOMAttributeValue($domNode, "showview"));
        $model->setVideoPlus(SerializerHelper::getDOMAttributeValue($domNode, "videoplus"));
        $model->setChannel(SerializerHelper::getDOMAttributeValue($domNode, "channel"));
        $model->setClumpIdx(SerializerHelper::getDOMAttributeValue($domNode, "clumpidx"));
        SerializerHelper::deserializeChildNodes($domNode, Title::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, SecondaryTitle::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Desc::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, Credits::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, Date::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Category::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Keyword::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, Language::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, OrigLanguage::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, Length::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Icon::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Url::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Country::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, EpisodeNum::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, Video::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, Audio::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, PreviouslyShown::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, Premiere::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, LastChance::DOM_NODE_NAME, $model);
        $model->setNew(null !== $newNode);
        SerializerHelper::deserializeChildNodes($domNode, Subtitles::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Rating::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, StarRating::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Review::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a quality node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Quality Returns the quality.
     */
    public static function deserializeQuality(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Quality();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a rating node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Rating Returns the rating.
     */
    public static function deserializeRating(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Rating();
        $model->setSystem(SerializerHelper::getDOMAttributeValue($domNode, "system"));
        SerializerHelper::deserializeChildNode($domNode, Value::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Icon::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a review node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Review Returns the review.
     */
    public static function deserializeReview(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Review();
        $model->setType(SerializerHelper::getDOMAttributeValue($domNode, "type"));
        $model->setSource(SerializerHelper::getDOMAttributeValue($domNode, "source"));
        $model->setReviewer(SerializerHelper::getDOMAttributeValue($domNode, "reviewer"));
        $model->setLang(SerializerHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Deserialize a sub-title node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return SecondaryTitle Returns the sub-title.
     */
    public static function deserializeSecondaryTitle(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new SecondaryTitle();
        $model->setLang(SerializerHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a star rating node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return StarRating Returns the star rating.
     */
    public static function deserializeStarRating(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new StarRating();
        SerializerHelper::deserializeChildNode($domNode, Value::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Icon::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a stereo node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Stereo Returns the stereo.
     */
    public static function deserializeStereo(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Stereo();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a subtitles node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Subtitles Returns the subtitles.
     */
    public static function deserializeSubtitles(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Subtitles();
        $model->setType(SerializerHelper::getDOMAttributeValue($domNode, "type"));
        SerializerHelper::deserializeChildNode($domNode, Language::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a title node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Title Returns the title.
     */
    public static function deserializeTitle(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Title();
        $model->setLang(SerializerHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a TV node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Tv Returns the TV.
     */
    public static function deserializeTv(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Tv();
        $model->setDate(SerializerHelper::getDOMAttributeValue($domNode, "date"));
        $model->setGeneratorInfoName(SerializerHelper::getDOMAttributeValue($domNode, "generator-info-name"));
        $model->setGeneratorInfoUrl(SerializerHelper::getDOMAttributeValue($domNode, "generator-info-url"));
        $model->setSourceDataUrl(SerializerHelper::getDOMAttributeValue($domNode, "source-data-url"));
        $model->setSourceInfoName(SerializerHelper::getDOMAttributeValue($domNode, "source-info-name"));
        $model->setSourceInfoUrl(SerializerHelper::getDOMAttributeValue($domNode, "source-info-url"));
        SerializerHelper::deserializeChildNodes($domNode, Channel::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNodes($domNode, Programme::DOM_NODE_NAME, $model);

        $model->indexProgrammesByChannel();

        return $model;
    }

    /**
     * Deserialize an URL node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Url Returns the URL.
     */
    public static function deserializeUrl(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Url();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a value node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Value Returns the value.
     */
    public static function deserializeValue(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Value();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }

    /**
     * Deserialize a video node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Video Returns the video.
     */
    public static function deserializeVideo(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Video();

        SerializerHelper::deserializeChildNode($domNode, Present::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, Colour::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, Aspect::DOM_NODE_NAME, $model);
        SerializerHelper::deserializeChildNode($domNode, Quality::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a writer node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Writer Returns the writer.
     */
    public static function deserializeWriter(DOMNode $domNode) {

        SerializerHelper::log($domNode);

        $model = new Writer();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }
}
