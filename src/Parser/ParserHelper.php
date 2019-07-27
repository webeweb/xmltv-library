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
use DOMNodeList;
use WBW\Library\XMLTV\Model\AbstractModel;
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
 * Parser helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Parser
 */
class ParserHelper {

    /**
     * Get a DOM attribute value.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $attributeName The attribute name.
     * @return string|null Returns the attribute value in case of success, null otherwise.
     */
    protected static function getDOMAttributeValue(DOMNode $domNode, $attributeName) {

        $attributes = $domNode->attributes;
        if (null === $attributes) {
            return null;
        }

        $attribute = $attributes->getNamedItem($attributeName);
        if (null === $attribute) {
            return null;
        }

        return $attribute->nodeValue;
    }

    /**
     * Get a DOM node by name.
     *
     * @param DOMNodeList|null $domNodeList The DOM node list.
     * @param string $nodeName The node name.
     * @return DOMNode|null Returns the DOM node in case of success, null otherwise.
     */
    protected static function getDOMNodeByName(DOMNodeList $domNodeList = null, $nodeName) {

        $domNodes = static::getDOMNodesByName($domNodeList, $nodeName);
        if (1 !== count($domNodes)) {
            return null;
        }

        return $domNodes[0];
    }

    /**
     * Get the DOM nodes by name.
     *
     * @param DOMNodeList|null $domNodeList The DOM node list.
     * @param string $nodeName The node name.
     * @return DOMNode[] Returns the DOM nodes.
     */
    protected static function getDOMNodesByName(DOMNodeList $domNodeList = null, $nodeName) {

        if (null === $domNodeList) {
            return [];
        }

        $domNodes = [];

        /** @var DOMNode $current */
        foreach ($domNodeList as $current) {

            if ($nodeName !== $current->nodeName) {
                continue;
            }

            $domNodes[] = $current;
        }

        return $domNodes;
    }

    /**
     * Get a method name.
     *
     * @param string $type The type.
     * @param string $attribute The attribute.
     * @return string Returns the method name.
     */
    protected static function getMethodName($type, $attribute) {

        $method = "";

        $parts = explode("-", $attribute);
        foreach ($parts as $current) {
            $method .= ucfirst($current);
        }

        return implode("", [$type, $method]);
    }

    /**
     * Parses an actor node.
     *
     * @param DOMNode $domNode The DOM node.
     * @return Actor Returns the actor.
     */
    public static function parseActor(DOMNode $domNode) {

        $model = new Actor();
        $model->setContent($domNode->textContent);
        $model->setRole(static::getDOMAttributeValue($domNode, "role"));

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

        static::parseChildNode($domNode, "present", $model);
        static::parseChildNode($domNode, "stereo", $model);

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
        $model->setLang(static::getDOMAttributeValue($domNode, "lang"));

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
        $model->setId(static::getDOMAttributeValue($domNode, "id"));

        static::parseChildNodes($domNode, "display-name", $model);
        static::parseChildNodes($domNode, "icon", $model);
        static::parseChildNodes($domNode, "url", $model);

        return $model;
    }

    /**
     * Parses a child node.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    protected static function parseChildNode(DomNode $domNode, $nodeName, AbstractModel $model) {

        $parser = static::getMethodName("parse", $nodeName);
        $setter = static::getMethodName("set", $nodeName);

        $node = static::getDOMNodeByName($domNode->childNodes, $nodeName);
        if (null !== $node) {
            $model->$setter(call_user_func_array(__NAMESPACE__ . "\\ParserHelper::" . $parser, [$node]));
        }
    }

    /**
     * Parses the child nodes.
     *
     * @param DOMNode $domNode The DOM node.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    protected static function parseChildNodes(DomNode $domNode, $nodeName, AbstractModel $model) {

        $parser = static::getMethodName("parse", $nodeName);
        $setter = static::getMethodName("add", $nodeName);

        $nodes = static::getDOMNodesByName($domNode->childNodes, $nodeName);
        foreach ($nodes as $current) {
            $model->$setter(call_user_func_array(__NAMESPACE__ . "\\ParserHelper::" . $parser, [$current]));
        }
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
        $model->setLang(static::getDOMAttributeValue($domNode, "lang"));

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

        static::parseChildNodes($domNode, "actor", $model);
        static::parseChildNodes($domNode, "adapter", $model);
        static::parseChildNodes($domNode, "commentator", $model);
        static::parseChildNodes($domNode, "composer", $model);
        static::parseChildNodes($domNode, "director", $model);
        static::parseChildNodes($domNode, "editor", $model);
        static::parseChildNodes($domNode, "guest", $model);
        static::parseChildNodes($domNode, "presenter", $model);
        static::parseChildNodes($domNode, "producer", $model);
        static::parseChildNodes($domNode, "writer", $model);

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
        $model->setLang(static::getDOMAttributeValue($domNode, "lang"));

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
        $model->setLang(static::getDOMAttributeValue($domNode, "lang"));

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
        $model->setSystem(static::getDOMAttributeValue($domNode, "system"));

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
        $model->setHeight(static::getDOMAttributeValue($domNode, "height"));
        $model->setSrc(static::getDOMAttributeValue($domNode, "src"));
        $model->setWidth(static::getDOMAttributeValue($domNode, "width"));

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
        $model->setLang(static::getDOMAttributeValue($domNode, "lang"));

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
        $model->setLang(static::getDOMAttributeValue($domNode, "lang"));

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
        $model->setLang(static::getDOMAttributeValue($domNode, "lang"));

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
        $model->setUnits(static::getDOMAttributeValue($domNode, "units"));

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
        $model->setLang(static::getDOMAttributeValue($domNode, "lang"));

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
        $model->setLang(static::getDOMAttributeValue($domNode, "lang"));

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
        $model->setChannel(static::getDOMAttributeValue($domNode, "channel"));
        $model->setStart(static::getDOMAttributeValue($domNode, "start"));

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

        $newNode = static::getDOMNodeByName($domNode->childNodes, "new");

        $model = new Programme();
        $model->setChannel(static::getDOMAttributeValue($domNode, "channel"));
        $model->setClumpIdx(boolval(static::getDOMAttributeValue($domNode, "clumpidx")));
        $model->setNew(null !== $newNode);
        $model->setShowView(static::getDOMAttributeValue($domNode, "showview"));
        $model->setPdcStart(static::getDOMAttributeValue($domNode, "pdc-start"));
        $model->setStart(static::getDOMAttributeValue($domNode, "start"));
        $model->setStop(static::getDOMAttributeValue($domNode, "stop"));
        $model->setVideoPlus(static::getDOMAttributeValue($domNode, "videoplus"));
        $model->setVpsStart(static::getDOMAttributeValue($domNode, "vps-start"));

        static::parseChildNode($domNode, "audio", $model);
        static::parseChildNodes($domNode, "category", $model);
        static::parseChildNodes($domNode, "country", $model);
        static::parseChildNode($domNode, "credits", $model);
        static::parseChildNode($domNode, "date", $model);
        static::parseChildNodes($domNode, "episode-num", $model);
        static::parseChildNodes($domNode, "desc", $model);
        static::parseChildNodes($domNode, "icon", $model);
        static::parseChildNodes($domNode, "keyword", $model);
        static::parseChildNode($domNode, "length", $model);
        static::parseChildNode($domNode, "language", $model);
        static::parseChildNode($domNode, "last-chance", $model);
        static::parseChildNode($domNode, "premiere", $model);
        static::parseChildNode($domNode, "previously-shown", $model);
        static::parseChildNodes($domNode, "rating", $model);
        static::parseChildNodes($domNode, "review", $model);
        static::parseChildNodes($domNode, "sub-title", $model);
        static::parseChildNodes($domNode, "star-rating", $model);
        static::parseChildNodes($domNode, "title", $model);
        static::parseChildNodes($domNode, "url", $model);
        static::parseChildNode($domNode, "video", $model);

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
        $model->setSystem(static::getDOMAttributeValue($domNode, "system"));

        static::parseChildNodes($domNode, "icon", $model);
        static::parseChildNode($domNode, "value", $model);

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
        $model->setLang(static::getDOMAttributeValue($domNode, "lang"));
        $model->setReviewer(static::getDOMAttributeValue($domNode, "reviewer"));
        $model->setSource(static::getDOMAttributeValue($domNode, "source"));
        $model->setType(static::getDOMAttributeValue($domNode, "type"));

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

        static::parseChildNodes($domNode, "icon", $model);
        static::parseChildNode($domNode, "value", $model);

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
        $model->setLang(static::getDOMAttributeValue($domNode, "lang"));

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
        $model->setType(static::getDOMAttributeValue($domNode, "type"));

        static::parseChildNode($domNode, "language", $model);

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
        $model->setLang(static::getDOMAttributeValue($domNode, "lang"));

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
        $model->setDate(static::getDOMAttributeValue($domNode, "date"));
        $model->setGeneratorInfoName(static::getDOMAttributeValue($domNode, "generator-info-name"));
        $model->setGeneratorInfoURL(static::getDOMAttributeValue($domNode, "generator-info-url"));
        $model->setSourceDataURL(static::getDOMAttributeValue($domNode, "source-data-url"));
        $model->setSourceInfoName(static::getDOMAttributeValue($domNode, "source-info-name"));
        $model->setSourceInfoURL(static::getDOMAttributeValue($domNode, "source-info-url"));

        static::parseChildNodes($domNode, "channel", $model);
        static::parseChildNodes($domNode, "programme", $model);

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

        static::parseChildNode($domNode, "aspect", $model);
        static::parseChildNode($domNode, "colour", $model);
        static::parseChildNode($domNode, "present", $model);
        static::parseChildNode($domNode, "quality", $model);

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
