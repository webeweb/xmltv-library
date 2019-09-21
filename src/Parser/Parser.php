<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Parser;

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
 * Parser.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Parser
 */
class Parser {

    /**
     * Parses an actor node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Actor Returns the actor.
     */
    public static function parseActor(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Actor();
        $model->setContent($domNode->textContent);
        $model->setRole(ParserHelper::getDOMAttributeValue($domNode, "role"));

        return $model;
    }

    /**
     * Parses an adapter node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Adapter Returns the adapter.
     */
    public static function parseAdapter(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Adapter();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses an aspect node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Aspect Returns the aspect.
     */
    public static function parseAspect(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Aspect();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses an audio node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Audio Returns the audio.
     */
    public static function parseAudio(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Audio();

        ParserHelper::parseChildNode($domNode, "present", $model);
        ParserHelper::parseChildNode($domNode, "stereo", $model);

        return $model;
    }

    /**
     * Parses a category node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Category Returns the category.
     */
    public static function parseCategory(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Category();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses a channel node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Channel Returns the channel.
     */
    public static function parseChannel(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Channel();
        $model->setId(ParserHelper::getDOMAttributeValue($domNode, "id"));

        ParserHelper::parseChildNodes($domNode, "display-name", $model);
        ParserHelper::parseChildNodes($domNode, "icon", $model);
        ParserHelper::parseChildNodes($domNode, "url", $model);

        return $model;
    }

    /**
     * Parses a colour node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Colour Returns the colour.
     */
    public static function parseColour(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Colour();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a commentator node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Commentator Returns the commentator.
     */
    public static function parseCommentator(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Commentator();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a composer node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Composer Returns the composer.
     */
    public static function parseComposer(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Composer();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a country node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Country Returns the country.
     */
    public static function parseCountry(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Country();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses a credits node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Credits Returns the credits.
     */
    public static function parseCredits(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Credits();

        ParserHelper::parseChildNodes($domNode, "actor", $model);
        ParserHelper::parseChildNodes($domNode, "adapter", $model);
        ParserHelper::parseChildNodes($domNode, "commentator", $model);
        ParserHelper::parseChildNodes($domNode, "composer", $model);
        ParserHelper::parseChildNodes($domNode, "director", $model);
        ParserHelper::parseChildNodes($domNode, "editor", $model);
        ParserHelper::parseChildNodes($domNode, "guest", $model);
        ParserHelper::parseChildNodes($domNode, "presenter", $model);
        ParserHelper::parseChildNodes($domNode, "producer", $model);
        ParserHelper::parseChildNodes($domNode, "writer", $model);

        return $model;
    }

    /**
     * Parses a date node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Date Returns the date.
     */
    public static function parseDate(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Date();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a description node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Desc Returns the description.
     */
    public static function parseDesc(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Desc();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses a director node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Director Returns the director.
     */
    public static function parseDirector(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Director();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a display name node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return DisplayName Returns the display name.
     */
    public static function parseDisplayName(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new DisplayName();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses an editor node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Editor Returns the editor.
     */
    public static function parseEditor(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Editor();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a episode number node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return EpisodeNum Returns the episode number.
     */
    public static function parseEpisodeNum(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new EpisodeNum();
        $model->setContent($domNode->textContent);
        $model->setSystem(ParserHelper::getDOMAttributeValue($domNode, "system"));

        return $model;
    }

    /**
     * Parses a guest node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Guest Returns the guest.
     */
    public static function parseGuest(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Guest();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses an icon node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Icon Returns the icon.
     */
    public static function parseIcon(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Icon();
        $model->setHeight(ParserHelper::getDOMAttributeValue($domNode, "height"));
        $model->setSrc(ParserHelper::getDOMAttributeValue($domNode, "src"));
        $model->setWidth(ParserHelper::getDOMAttributeValue($domNode, "width"));

        return $model;
    }

    /**
     * Parses a keyword node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Keyword Returns the keyword.
     */
    public static function parseKeyword(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Keyword();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses a language node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Language Returns the language.
     */
    public static function parseLanguage(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Language();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses a last chance node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return LastChance Returns the last chance.
     */
    public static function parseLastChance(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new LastChance();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses a length node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Length Returns the length.
     */
    public static function parseLength(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Length();
        $model->setContent($domNode->textContent);
        $model->setUnits(ParserHelper::getDOMAttributeValue($domNode, "units"));

        return $model;
    }

    /**
     * Parses an original language node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return OrigLanguage Returns the original language.
     */
    public static function parseOrigLanguage(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new OrigLanguage();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses a premiere node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Premiere Returns the premiere.
     */
    public static function parsePremiere(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Premiere();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses a present node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Present Returns the present.
     */
    public static function parsePresent(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Present();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a presenter node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Presenter Returns the presenter.
     */
    public static function parsePresenter(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Presenter();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a previously shown node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return PreviouslyShown Returns the previously shown.
     */
    public static function parsePreviouslyShown(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new PreviouslyShown();
        $model->setChannel(ParserHelper::getDOMAttributeValue($domNode, "channel"));
        $model->setStart(ParserHelper::getDOMAttributeValue($domNode, "start"));

        return $model;
    }

    /**
     * Parses a producer node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Producer Returns the producer.
     */
    public static function parseProducer(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Producer();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a programme node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Programme Returns the programme.
     */
    public static function parseProgramme(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $newNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "new");

        $model = new Programme();
        $model->setChannel(ParserHelper::getDOMAttributeValue($domNode, "channel"));
        $model->setClumpIdx(ParserHelper::getDOMAttributeValue($domNode, "clumpidx"));
        $model->setNew(null !== $newNode);
        $model->setShowView(ParserHelper::getDOMAttributeValue($domNode, "showview"));
        $model->setPdcStart(ParserHelper::getDOMAttributeValue($domNode, "pdc-start"));
        $model->setStart(ParserHelper::getDOMAttributeValue($domNode, "start"));
        $model->setStop(ParserHelper::getDOMAttributeValue($domNode, "stop"));
        $model->setVideoPlus(ParserHelper::getDOMAttributeValue($domNode, "videoplus"));
        $model->setVpsStart(ParserHelper::getDOMAttributeValue($domNode, "vps-start"));

        ParserHelper::parseChildNode($domNode, "audio", $model);
        ParserHelper::parseChildNodes($domNode, "category", $model);
        ParserHelper::parseChildNodes($domNode, "country", $model);
        ParserHelper::parseChildNode($domNode, "credits", $model);
        ParserHelper::parseChildNode($domNode, "date", $model);
        ParserHelper::parseChildNodes($domNode, "episode-num", $model);
        ParserHelper::parseChildNodes($domNode, "desc", $model);
        ParserHelper::parseChildNodes($domNode, "icon", $model);
        ParserHelper::parseChildNodes($domNode, "keyword", $model);
        ParserHelper::parseChildNode($domNode, "length", $model);
        ParserHelper::parseChildNode($domNode, "language", $model);
        ParserHelper::parseChildNode($domNode, "last-chance", $model);
        ParserHelper::parseChildNode($domNode, "premiere", $model);
        ParserHelper::parseChildNode($domNode, "orig-language", $model);
        ParserHelper::parseChildNode($domNode, "previously-shown", $model);
        ParserHelper::parseChildNodes($domNode, "rating", $model);
        ParserHelper::parseChildNodes($domNode, "review", $model);
        ParserHelper::parseChildNodes($domNode, "sub-title", $model);
        ParserHelper::parseChildNodes($domNode, "subtitles", $model);
        ParserHelper::parseChildNodes($domNode, "star-rating", $model);
        ParserHelper::parseChildNodes($domNode, "title", $model);
        ParserHelper::parseChildNodes($domNode, "url", $model);
        ParserHelper::parseChildNode($domNode, "video", $model);

        return $model;
    }

    /**
     * Parses a quality node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Quality Returns the quality.
     */
    public static function parseQuality(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Quality();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a rating node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Rating Returns the rating.
     */
    public static function parseRating(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Rating();
        $model->setSystem(ParserHelper::getDOMAttributeValue($domNode, "system"));

        ParserHelper::parseChildNodes($domNode, "icon", $model);
        ParserHelper::parseChildNode($domNode, "value", $model);

        return $model;
    }

    /**
     * Parses a review node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Review Returns the review.
     */
    public static function parseReview(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Review();
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setReviewer(ParserHelper::getDOMAttributeValue($domNode, "reviewer"));
        $model->setSource(ParserHelper::getDOMAttributeValue($domNode, "source"));
        $model->setType(ParserHelper::getDOMAttributeValue($domNode, "type"));

        return $model;
    }

    /**
     * Parses a sub-title node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return SecondaryTitle Returns the sub-title.
     */
    public static function parseSecondaryTitle(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new SecondaryTitle();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses a star rating node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return StarRating Returns the star rating.
     */
    public static function parseStarRating(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new StarRating();

        ParserHelper::parseChildNodes($domNode, "icon", $model);
        ParserHelper::parseChildNode($domNode, "value", $model);

        return $model;
    }

    /**
     * Parses a stereo node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Stereo Returns the stereo.
     */
    public static function parseStereo(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Stereo();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a subtitles node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Subtitles Returns the subtitles.
     */
    public static function parseSubtitles(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Subtitles();
        $model->setType(ParserHelper::getDOMAttributeValue($domNode, "type"));

        ParserHelper::parseChildNode($domNode, "language", $model);

        return $model;
    }

    /**
     * Parses a title node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Title Returns the title.
     */
    public static function parseTitle(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Title();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses a TV node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Tv Returns the TV.
     */
    public static function parseTv(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Tv();
        $model->setDate(ParserHelper::getDOMAttributeValue($domNode, "date"));
        $model->setGeneratorInfoName(ParserHelper::getDOMAttributeValue($domNode, "generator-info-name"));
        $model->setGeneratorInfoURL(ParserHelper::getDOMAttributeValue($domNode, "generator-info-url"));
        $model->setSourceDataURL(ParserHelper::getDOMAttributeValue($domNode, "source-data-url"));
        $model->setSourceInfoName(ParserHelper::getDOMAttributeValue($domNode, "source-info-name"));
        $model->setSourceInfoURL(ParserHelper::getDOMAttributeValue($domNode, "source-info-url"));

        ParserHelper::parseChildNodes($domNode, "channel", $model);
        ParserHelper::parseChildNodes($domNode, "programme", $model);

        $model->indexProgrammesByChannel();

        return $model;
    }

    /**
     * Parses an URL node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Url Returns the URL.
     */
    public static function parseUrl(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Url();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a value node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Value Returns the value.
     */
    public static function parseValue(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Value();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a video node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Video Returns the video.
     */
    public static function parseVideo(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Video();

        ParserHelper::parseChildNode($domNode, "aspect", $model);
        ParserHelper::parseChildNode($domNode, "colour", $model);
        ParserHelper::parseChildNode($domNode, "present", $model);
        ParserHelper::parseChildNode($domNode, "quality", $model);

        return $model;
    }

    /**
     * Parses a writer node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Writer Returns the writer.
     */
    public static function parseWriter(DOMNode $domNode) {

        ParserHelper::log($domNode);

        $model = new Writer();
        $model->setContent($domNode->textContent);

        return $model;
    }
}
