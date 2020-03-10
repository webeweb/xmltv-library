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

        XmlDeserializerHelper::log($domNode);

        $model = new Actor();
        $model->setContent(trim($domNode->textContent));
        $model->setRole(XmlDeserializerHelper::getDOMAttributeValue($domNode, "role"));

        return $model;
    }

    /**
     * Deserialize an adapter node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Adapter Returns the adapter.
     */
    public static function deserializeAdapter(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

        $model = new Audio();

        XmlDeserializerHelper::deserializeChildNode($domNode, "present", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "stereo", $model);

        return $model;
    }

    /**
     * Deserialize a category node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Category Returns the category.
     */
    public static function deserializeCategory(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new Category();
        $model->setContent(trim($domNode->textContent));
        $model->setLang(XmlDeserializerHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Deserialize a channel node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Channel Returns the channel.
     */
    public static function deserializeChannel(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new Channel();
        $model->setId(XmlDeserializerHelper::getDOMAttributeValue($domNode, "id"));

        XmlDeserializerHelper::deserializeChildNodes($domNode, "display-name", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "icon", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "url", $model);

        return $model;
    }

    /**
     * Deserialize a colour node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Colour Returns the colour.
     */
    public static function deserializeColour(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

        $model = new Country();
        $model->setContent(trim($domNode->textContent));
        $model->setLang(XmlDeserializerHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Deserialize a credits node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Credits Returns the credits.
     */
    public static function deserializeCredits(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new Credits();

        XmlDeserializerHelper::deserializeChildNodes($domNode, "actor", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "adapter", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "commentator", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "composer", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "director", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "editor", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "guest", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "presenter", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "producer", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "writer", $model);

        return $model;
    }

    /**
     * Deserialize a date node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Date Returns the date.
     */
    public static function deserializeDate(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

        $model = new Desc();
        $model->setContent(trim($domNode->textContent));
        $model->setLang(XmlDeserializerHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Deserialize a director node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Director Returns the director.
     */
    public static function deserializeDirector(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

        $model = new DisplayName();
        $model->setContent(trim($domNode->textContent));
        $model->setLang(XmlDeserializerHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Deserialize an editor node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Editor Returns the editor.
     */
    public static function deserializeEditor(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

        $model = new EpisodeNum();
        $model->setContent(trim($domNode->textContent));
        $model->setSystem(XmlDeserializerHelper::getDOMAttributeValue($domNode, "system"));

        return $model;
    }

    /**
     * Deserialize a guest node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Guest Returns the guest.
     */
    public static function deserializeGuest(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

        $model = new Icon();
        $model->setHeight(XmlDeserializerHelper::getDOMAttributeValue($domNode, "height"));
        $model->setSrc(XmlDeserializerHelper::getDOMAttributeValue($domNode, "src"));
        $model->setWidth(XmlDeserializerHelper::getDOMAttributeValue($domNode, "width"));

        return $model;
    }

    /**
     * Deserialize a keyword node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Keyword Returns the keyword.
     */
    public static function deserializeKeyword(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new Keyword();
        $model->setContent(trim($domNode->textContent));
        $model->setLang(XmlDeserializerHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Deserialize a language node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Language Returns the language.
     */
    public static function deserializeLanguage(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new Language();
        $model->setContent(trim($domNode->textContent));
        $model->setLang(XmlDeserializerHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Deserialize a last chance node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return LastChance Returns the last chance.
     */
    public static function deserializeLastChance(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new LastChance();
        $model->setContent(trim($domNode->textContent));
        $model->setLang(XmlDeserializerHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Deserialize a length node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Length Returns the length.
     */
    public static function deserializeLength(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new Length();
        $model->setContent(trim($domNode->textContent));
        $model->setUnits(XmlDeserializerHelper::getDOMAttributeValue($domNode, "units"));

        return $model;
    }

    /**
     * Deserialize an original language node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return OrigLanguage Returns the original language.
     */
    public static function deserializeOrigLanguage(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new OrigLanguage();
        $model->setContent(trim($domNode->textContent));
        $model->setLang(XmlDeserializerHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Deserialize a premiere node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Premiere Returns the premiere.
     */
    public static function deserializePremiere(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new Premiere();
        $model->setContent(trim($domNode->textContent));
        $model->setLang(XmlDeserializerHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Deserialize a present node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Present Returns the present.
     */
    public static function deserializePresent(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

        $model = new PreviouslyShown();
        $model->setChannel(XmlDeserializerHelper::getDOMAttributeValue($domNode, "channel"));
        $model->setStart(XmlDeserializerHelper::getDOMAttributeValue($domNode, "start"));

        return $model;
    }

    /**
     * Deserialize a producer node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Producer Returns the producer.
     */
    public static function deserializeProducer(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

        $newNode = XmlDeserializerHelper::getDOMNodeByName( "new", $domNode->childNodes);

        $model = new Programme();
        $model->setChannel(XmlDeserializerHelper::getDOMAttributeValue($domNode, "channel"));
        $model->setClumpIdx(XmlDeserializerHelper::getDOMAttributeValue($domNode, "clumpidx"));
        $model->setNew(null !== $newNode);
        $model->setShowView(XmlDeserializerHelper::getDOMAttributeValue($domNode, "showview"));
        $model->setPdcStart(XmlDeserializerHelper::getDOMAttributeValue($domNode, "pdc-start"));
        $model->setStart(XmlDeserializerHelper::getDOMAttributeValue($domNode, "start"));
        $model->setStop(XmlDeserializerHelper::getDOMAttributeValue($domNode, "stop"));
        $model->setVideoPlus(XmlDeserializerHelper::getDOMAttributeValue($domNode, "videoplus"));
        $model->setVpsStart(XmlDeserializerHelper::getDOMAttributeValue($domNode, "vps-start"));

        XmlDeserializerHelper::deserializeChildNode($domNode, "audio", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "category", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "country", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "credits", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "date", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "episode-num", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "desc", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "icon", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "keyword", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "length", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "language", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "last-chance", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "premiere", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "orig-language", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "previously-shown", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "rating", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "review", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "sub-title", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "subtitles", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "star-rating", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "title", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "url", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "video", $model);

        return $model;
    }

    /**
     * Deserialize a quality node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Quality Returns the quality.
     */
    public static function deserializeQuality(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

        $model = new Rating();
        $model->setSystem(XmlDeserializerHelper::getDOMAttributeValue($domNode, "system"));

        XmlDeserializerHelper::deserializeChildNodes($domNode, "icon", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "value", $model);

        return $model;
    }

    /**
     * Deserialize a review node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Review Returns the review.
     */
    public static function deserializeReview(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new Review();
        $model->setLang(XmlDeserializerHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setReviewer(XmlDeserializerHelper::getDOMAttributeValue($domNode, "reviewer"));
        $model->setSource(XmlDeserializerHelper::getDOMAttributeValue($domNode, "source"));
        $model->setType(XmlDeserializerHelper::getDOMAttributeValue($domNode, "type"));

        return $model;
    }

    /**
     * Deserialize a sub-title node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return SecondaryTitle Returns the sub-title.
     */
    public static function deserializeSecondaryTitle(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new SecondaryTitle();
        $model->setContent(trim($domNode->textContent));
        $model->setLang(XmlDeserializerHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Deserialize a star rating node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return StarRating Returns the star rating.
     */
    public static function deserializeStarRating(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new StarRating();

        XmlDeserializerHelper::deserializeChildNodes($domNode, "icon", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "value", $model);

        return $model;
    }

    /**
     * Deserialize a stereo node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Stereo Returns the stereo.
     */
    public static function deserializeStereo(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

        $model = new Subtitles();
        $model->setType(XmlDeserializerHelper::getDOMAttributeValue($domNode, "type"));

        XmlDeserializerHelper::deserializeChildNode($domNode, "language", $model);

        return $model;
    }

    /**
     * Deserialize a title node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Title Returns the title.
     */
    public static function deserializeTitle(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new Title();
        $model->setContent(trim($domNode->textContent));
        $model->setLang(XmlDeserializerHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Deserialize a TV node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Tv Returns the TV.
     */
    public static function deserializeTv(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new Tv();
        $model->setDate(XmlDeserializerHelper::getDOMAttributeValue($domNode, "date"));
        $model->setGeneratorInfoName(XmlDeserializerHelper::getDOMAttributeValue($domNode, "generator-info-name"));
        $model->setGeneratorInfoUrl(XmlDeserializerHelper::getDOMAttributeValue($domNode, "generator-info-url"));
        $model->setSourceDataUrl(XmlDeserializerHelper::getDOMAttributeValue($domNode, "source-data-url"));
        $model->setSourceInfoName(XmlDeserializerHelper::getDOMAttributeValue($domNode, "source-info-name"));
        $model->setSourceInfoUrl(XmlDeserializerHelper::getDOMAttributeValue($domNode, "source-info-url"));

        XmlDeserializerHelper::deserializeChildNodes($domNode, "channel", $model);
        XmlDeserializerHelper::deserializeChildNodes($domNode, "programme", $model);

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

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

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

        XmlDeserializerHelper::log($domNode);

        $model = new Video();

        XmlDeserializerHelper::deserializeChildNode($domNode, "aspect", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "colour", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "present", $model);
        XmlDeserializerHelper::deserializeChildNode($domNode, "quality", $model);

        return $model;
    }

    /**
     * Deserialize a writer node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Writer Returns the writer.
     */
    public static function deserializeWriter(DOMNode $domNode) {

        XmlDeserializerHelper::log($domNode);

        $model = new Writer();
        $model->setContent(trim($domNode->textContent));

        return $model;
    }
}
