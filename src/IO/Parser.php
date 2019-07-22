<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\IO;

use DOMNode;
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

/**
 * Parser.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\IO
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

        $displayNameNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "display-name");
        if (null !== $displayNameNode) {
            $model->setDisplayName(static::parseDisplayName($displayNameNode));
        }

        $iconNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "icon");
        if (null !== $iconNode) {
            $model->setIcon(static::parseIcon($iconNode));
        }

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

        $composerNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "composer");
        foreach ($composerNodes as $current) {
            $model->addComposer(static::parseComposer($current));
        }

        $directorNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "director");
        foreach ($directorNodes as $current) {
            $model->addDirector(static::parseDirector($current));
        }

        $guestNodes = ParserHelper::getDOMNodesByName($domNode->childNodes, "guest");
        foreach ($guestNodes as $current) {
            $model->addGuest(static::parseGuest($current));
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
     * Parses a desc node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Desc Returns the desc.
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
     * Parses a icon node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Icon Returns the icon.
     */
    public static function parseIcon(DOMNode $domNode) {

        $model = new Icon();
        $model->setSrc(ParserHelper::getDOMAttributeValue($domNode, "src"));

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

        $iconNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "icon");
        if (null !== $iconNode) {
            $model->setIcon(static::parseIcon($iconNode));
        }

        $valueNode = ParserHelper::getDOMNodeByName($domNode->childNodes, "value");
        if (null !== $valueNode) {
            $model->setValue(static::parseValue($valueNode));
        }

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
     * Parses a TV node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return TV Returns the TV.
     */
    public static function parseTV(DOMNode $domNode) {

        $model = new TV();
        $model->setGeneratorInfoName(ParserHelper::getDOMAttributeValue($domNode, "generator-info-name"));
        $model->setGeneratorInfoURL(ParserHelper::getDOMAttributeValue($domNode, "generator-info-url"));
        $model->setSourceDataURL(ParserHelper::getDOMAttributeValue($domNode, "source-data-url"));
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
     * Parses a title node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Title Returns the title.
     */
    public static function parseTitle(DOMNode $domNode) {

        $model = new Title();
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
