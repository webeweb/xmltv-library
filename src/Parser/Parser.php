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

        $model = new Audio();

        $presentNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "present");
        if (null !== $presentNode) {
            $model->setPresent(static::parsePresent($presentNode));
        }

        $stereoNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "stereo");
        if (null !== $stereoNode) {
            $model->setStereo(static::parseStereo($stereoNode));
        }

        return $model;
    }

    /**
     * Parses a category node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Category Returns the category.
     */
    public static function parseCategory(DOMNode $domNode) {

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

        $model = new Channel();
        $model->setId(ParserHelper::getDOMAttributeValue($domNode, "id"));

        $displayNameNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "display-name");
        foreach ($displayNameNodes as $current) {
            $model->addDisplayName(static::parseDisplayName($current));
        }

        $iconNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "icon");
        foreach ($iconNodes as $current) {
            $model->addIcon(static::parseIcon($current));
        }

        $urlNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "url");
        foreach ($urlNodes as $current) {
            $model->addUrl(static::parseUrl($current));
        }

        return $model;
    }

    /**
     * Parses a colour node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Colour Returns the colour.
     */
    public static function parseColour(DOMNode $domNode) {

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

        $model = new Credits();

        $actorNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "actor");
        foreach ($actorNodes as $current) {
            $model->addActor(static::parseActor($current));
        }

        $adapterNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "adapter");
        foreach ($adapterNodes as $current) {
            $model->addAdapter(static::parseAdapter($current));
        }

        $commentatorNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "commentator");
        foreach ($commentatorNodes as $current) {
            $model->addCommentator(static::parseCommentator($current));
        }

        $composerNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "composer");
        foreach ($composerNodes as $current) {
            $model->addComposer(static::parseComposer($current));
        }

        $directorNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "director");
        foreach ($directorNodes as $current) {
            $model->addDirector(static::parseDirector($current));
        }

        $editorNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "editor");
        foreach ($editorNodes as $current) {
            $model->addEditor(static::parseEditor($current));
        }

        $guestNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "guest");
        foreach ($guestNodes as $current) {
            $model->addGuest(static::parseGuest($current));
        }

        $presenterNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "presenter");
        foreach ($presenterNodes as $current) {
            $model->addPresenter(static::parsePresenter($current));
        }

        $producerNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "producer");
        foreach ($producerNodes as $current) {
            $model->addProducer(static::parseProducer($current));
        }

        $writerNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "writer");
        foreach ($writerNodes as $current) {
            $model->addWriter(static::parseWriter($current));
        }

        return $model;
    }

    /**
     * Parses a date node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Date Returns the date.
     */
    public static function parseDate(DOMNode $domNode) {

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

        $model = new DisplayName();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses a editor node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Editor Returns the editor.
     */
    public static function parseEditor(DOMNode $domNode) {

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

        $model = new Length();
        $model->setContent($domNode->textContent);
        $model->setUnits(ParserHelper::getDOMAttributeValue($domNode, "units"));

        return $model;
    }

    /**
     * Parses a original language node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return OrigLanguage Returns the original language.
     */
    public static function parseOrigLanguage(DOMNode $domNode) {

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

        $model = new Programme();
        $model->setChannel(ParserHelper::getDOMAttributeValue($domNode, "channel"));
        $model->setShowView(ParserHelper::getDOMAttributeValue($domNode, "show-view"));
        $model->setStart(ParserHelper::getDOMAttributeValue($domNode, "start"));
        $model->setStop(ParserHelper::getDOMAttributeValue($domNode, "stop"));

        $categoryNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "category");
        if (null !== $categoryNode) {
            $model->setCategory(static::parseCategory($categoryNode));
        }

        $countryNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "country");
        if (null !== $countryNode) {
            $model->setCountry(static::parseCountry($countryNode));
        }

        $creditsNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "credits");
        if (null !== $creditsNode) {
            $model->setCredits(static::parseCredits($creditsNode));
        }

        $dateNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "date");
        if (null !== $dateNode) {
            $model->setDate(static::parseDate($dateNode));
        }

        $descNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "desc");
        if (null !== $descNode) {
            $model->setDesc(static::parseDesc($descNode));
        }

        $iconNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "icon");
        if (null !== $iconNode) {
            $model->setIcon(static::parseIcon($iconNode));
        }

        $lengthNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "length");
        if (null !== $lengthNode) {
            $model->setLength(static::parseLength($lengthNode));
        }

        $ratingNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "rating");
        if (null !== $ratingNode) {
            $model->setRating(static::parseRating($ratingNode));
        }

        $titleNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "title");
        if (null !== $titleNode) {
            $model->setTitle(static::parseTitle($titleNode));
        }

        return $model;
    }

    /**
     * Parses a quality node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Quality Returns the quality.
     */
    public static function parseQuality(DOMNode $domNode) {

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

        $model = new Rating();
        $model->setSystem(ParserHelper::getDOMAttributeValue($domNode, "system"));

        $iconNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "icon");
        foreach ($iconNodes as $current) {
            $model->addIcon(static::parseIcon($current));
        }

        $valueNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "value");
        if (null !== $valueNode) {
            $model->setValue(static::parseValue($valueNode));
        }

        return $model;
    }

    /**
     * Parses a review node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Review Returns the review.
     */
    public static function parseReview(DOMNode $domNode) {

        $model = new Review();
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));
        $model->setReviewer(ParserHelper::getDOMAttributeValue($domNode, "reviewer"));
        $model->setSource(ParserHelper::getDOMAttributeValue($domNode, "source"));
        $model->setType(ParserHelper::getDOMAttributeValue($domNode, "type"));

        return $model;
    }

    /**
     * Parses a star rating node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return StarRating Returns the star rating.
     */
    public static function parseStarRating(DOMNode $domNode) {

        $model = new StarRating();

        $iconNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "icon");
        foreach ($iconNodes as $current) {
            $model->addIcon(static::parseIcon($current));
        }

        $valueNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "value");
        if (null !== $valueNode) {
            $model->setValue(static::parseValue($valueNode));
        }

        return $model;
    }

    /**
     * Parses a stereo node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Stereo Returns the stereo.
     */
    public static function parseStereo(DOMNode $domNode) {

        $model = new Stereo();
        $model->setContent($domNode->textContent);

        return $model;
    }

    /**
     * Parses a sub-title node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return SubTitle Returns the sub-title.
     */
    public static function parseSubTitle(DOMNode $domNode) {

        $model = new SubTitle();
        $model->setContent($domNode->textContent);
        $model->setLang(ParserHelper::getDOMAttributeValue($domNode, "lang"));

        return $model;
    }

    /**
     * Parses a subtitles node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Subtitles Returns the subtitles.
     */
    public static function parseSubtitles(DOMNode $domNode) {

        $model = new Subtitles();
        $model->setType(ParserHelper::getDOMAttributeValue($domNode, "type"));

        $languageNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "language");
        if (null !== $languageNode) {
            $model->setLanguage(static::parseLanguage($languageNode));
        }

        return $model;
    }

    /**
     * Parses a title node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Title Returns the title.
     */
    public static function parseTitle(DOMNode $domNode) {

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

        $model = new Tv();
        $model->setDate(ParserHelper::getDOMAttributeValue($domNode, "date"));
        $model->setGeneratorInfoName(ParserHelper::getDOMAttributeValue($domNode, "generator-info-name"));
        $model->setGeneratorInfoURL(ParserHelper::getDOMAttributeValue($domNode, "generator-info-url"));
        $model->setSourceDataURL(ParserHelper::getDOMAttributeValue($domNode, "source-data-url"));
        $model->setSourceInfoName(ParserHelper::getDOMAttributeValue($domNode, "source-info-name"));
        $model->setSourceInfoURL(ParserHelper::getDOMAttributeValue($domNode, "source-info-url"));

        $channelNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "channel");
        foreach ($channelNodes as $current) {
            $model->addChannel(static::parseChannel($current));
        }

        $programmeNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "programme");
        foreach ($programmeNodes as $current) {
            $model->addProgramme(static::parseProgramme($current));
        }

        return $model;
    }

    /**
     * Parses an URL node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Url Returns the URL.
     */
    public static function parseUrl(DOMNode $domNode) {

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

        $model = new Video();

        $aspectNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "aspect");
        if (null !== $aspectNode) {
            $model->setAspect(static::parseAspect($aspectNode));
        }

        $colourNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "colour");
        if (null !== $colourNode) {
            $model->setColour(static::parseColour($colourNode));
        }

        $presentNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "present");
        if (null !== $presentNode) {
            $model->setPresent(static::parsePresent($presentNode));
        }

        $qualityNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "quality");
        if (null !== $qualityNode) {
            $model->setQuality(static::parseQuality($qualityNode));
        }

        return $model;
    }

    /**
     * Parses a writer node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Writer Returns the writer.
     */
    public static function parseWriter(DOMNode $domNode) {

        $model = new Writer();
        $model->setContent($domNode->textContent);

        return $model;
    }
}
