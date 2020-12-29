<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Serializer;

use WBW\Library\Core\Argument\Helper\ArrayHelper;
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
 * JSON deserializer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Serializer
 */
class JsonDeserializer {

    /**
     * Deserialize an actor.
     *
     * @param array $data The data.
     * @return Actor Returns the actor.
     */
    public static function deserializeActor(array $data): Actor {

        $model = new Actor();
        $model->setRole(ArrayHelper::get($data, "role"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize an adapter.
     *
     * @param array $data The data.
     * @return Adapter Returns the adapter.
     */
    public static function deserializeAdapter(array $data): Adapter {

        $model = new Adapter();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize an array.
     *
     * @param array $array The array.
     * @param string $nodeName The node name.
     * @param AbstractModel $model The model.
     * @return void
     */
    protected static function deserializeArray(array $array, $nodeName, AbstractModel $model): void {

        $fct = __NAMESPACE__ . "\\JsonDeserializer::" . SerializerHelper::getMethodName("deserialize", $nodeName);
        $add = SerializerHelper::getMethodName("add", $nodeName);

        foreach ($array as $current) {
            $model->$add(call_user_func($fct, $current));
        }
    }

    /**
     * Deserialize an aspect.
     *
     * @param array $data The data.
     * @return Aspect Returns the aspect.
     */
    public static function deserializeAspect(array $data): Aspect {

        $model = new Aspect();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize an audio.
     *
     * @param array $data The data.
     * @return Audio Returns the audio.
     */
    public static function deserializeAudio(array $data): Audio {

        $model = new Audio();
        $model->setPresent(static::deserializePresent(ArrayHelper::get($data, "present", [])));
        $model->setStereo(static::deserializeStereo(ArrayHelper::get($data, "stereo", [])));

        return $model;
    }

    /**
     * Deserialize a category.
     *
     * @param array $data The data.
     * @return Category Returns the category.
     */
    public static function deserializeCategory(array $data): Category {

        $model = new Category();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a channel.
     *
     * @param array $data The data.
     * @return Channel Returns the channel.
     */
    public static function deserializeChannel(array $data): Channel {

        $model = new Channel();
        $model->setId(ArrayHelper::get($data, "id"));
        static::deserializeArray(ArrayHelper::get($data, "displayNames", []), DisplayName::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "icons", []), Icon::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "urls", []), Url::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a colour.
     *
     * @param array $data The data.
     * @return Colour Returns the colour.
     */
    public static function deserializeColour(array $data): Colour {

        $model = new Colour();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a commentator.
     *
     * @param array $data The data.
     * @return Commentator Returns the commentator.
     */
    public static function deserializeCommentator(array $data): Commentator {

        $model = new Commentator();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a composer.
     *
     * @param array $data The data.
     * @return Composer Returns the composer.
     */
    public static function deserializeComposer(array $data): Composer {

        $model = new Composer();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a country.
     *
     * @param array $data The data.
     * @return Country Returns the country.
     */
    public static function deserializeCountry(array $data): Country {

        $model = new Country();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize the credits.
     *
     * @param array $data The data.
     * @return Credits Returns the credits.
     */
    public static function deserializeCredits(array $data): Credits {

        $model = new Credits();
        static::deserializeArray(ArrayHelper::get($data, "directors", []), Director::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "actors", []), Actor::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "writers", []), Writer::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "adapters", []), Adapter::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "producers", []), Producer::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "composers", []), Composer::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "editors", []), Editor::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "presenters", []), Presenter::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "commentators", []), Commentator::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "guests", []), Guest::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a date.
     *
     * @param array $data The data.
     * @return Date Returns the date.
     */
    public static function deserializeDate(array $data): Date {

        $model = new Date();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a description.
     *
     * @param array $data The data.
     * @return Desc Returns the description.
     */
    public static function deserializeDesc(array $data): Desc {

        $model = new Desc();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a director.
     *
     * @param array $data The data.
     * @return Director Returns the director.
     */
    public static function deserializeDirector(array $data): Director {

        $model = new Director();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a display name.
     *
     * @param array $data The data.
     * @return DisplayName Returns the display name.
     */
    public static function deserializeDisplayName(array $data): DisplayName {

        $model = new DisplayName();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize an editor.
     *
     * @param array $data The data.
     * @return Editor Returns the editor.
     */
    public static function deserializeEditor(array $data): Editor {

        $model = new Editor();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a episode number.
     *
     * @param array $data The data.
     * @return EpisodeNum Returns the episode number.
     */
    public static function deserializeEpisodeNum(array $data): EpisodeNum {

        $model = new EpisodeNum();
        $model->setSystem(ArrayHelper::get($data, "system"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a guest.
     *
     * @param array $data The data.
     * @return Guest Returns the guest.
     */
    public static function deserializeGuest(array $data): Guest {

        $model = new Guest();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a icon.
     *
     * @param array $data The data.
     * @return Icon Returns the icon.
     */
    public static function deserializeIcon(array $data): Icon {

        $model = new Icon();
        $model->setSrc(ArrayHelper::get($data, "src"));
        $model->setWidth(ArrayHelper::get($data, "width"));
        $model->setHeight(ArrayHelper::get($data, "height"));

        return $model;
    }

    /**
     * Deserialize a keyword.
     *
     * @param array $data The data.
     * @return Keyword Returns the keyword.
     */
    public static function deserializeKeyword(array $data): Keyword {

        $model = new Keyword();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a language.
     *
     * @param array $data The data.
     * @return Language Returns the language.
     */
    public static function deserializeLanguage(array $data): Language {

        $model = new Language();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a last chance.
     *
     * @param array $data The data.
     * @return LastChance Returns the last chance.
     */
    public static function deserializeLastChance(array $data): LastChance {

        $model = new LastChance();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a length.
     *
     * @param array $data The data.
     * @return Length Returns the length.
     */
    public static function deserializeLength(array $data): Length {

        $model = new Length();
        $model->setUnits(ArrayHelper::get($data, "units"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize an original language.
     *
     * @param array $data The data.
     * @return OrigLanguage Returns the original language.
     */
    public static function deserializeOrigLanguage(array $data): OrigLanguage {

        $model = new OrigLanguage();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a premiere.
     *
     * @param array $data The data.
     * @return Premiere Returns the premiere.
     */
    public static function deserializePremiere(array $data): Premiere {

        $model = new Premiere();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a present.
     *
     * @param array $data The data.
     * @return Present Returns the present.
     */
    public static function deserializePresent(array $data): Present {

        $model = new Present();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a presenter.
     *
     * @param array $data The data.
     * @return Presenter Returns the presenter.
     */
    public static function deserializePresenter(array $data): Presenter {

        $model = new Presenter();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a previously shown.
     *
     * @param array $data The data.
     * @return PreviouslyShown Returns the previously shown.
     */
    public static function deserializePreviouslyShown(array $data): PreviouslyShown {

        $model = new PreviouslyShown();
        $model->setChannel(ArrayHelper::get($data, "channel"));
        $model->setStart(ArrayHelper::get($data, "start"));

        return $model;
    }

    /**
     * Deserialize a producer.
     *
     * @param array $data The data.
     * @return Producer Returns the producer.
     */
    public static function deserializeProducer(array $data): Producer {

        $model = new Producer();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a programme.
     *
     * @param array $data The data.
     * @return Programme Returns the programme.
     */
    public static function deserializeProgramme(array $data): Programme {

        $model = new Programme();
        $model->setStart(ArrayHelper::get($data, "start"));
        $model->setStop(ArrayHelper::get($data, "stop"));
        $model->setPdcStart(ArrayHelper::get($data, "pdcStart"));
        $model->setVpsStart(ArrayHelper::get($data, "vpsStart"));
        $model->setShowView(ArrayHelper::get($data, "showView"));
        $model->setVideoPlus(ArrayHelper::get($data, "videoPlus"));
        $model->setChannel(ArrayHelper::get($data, "channel"));
        $model->setClumpIdx(ArrayHelper::get($data, "clumpIdx"));
        static::deserializeArray(ArrayHelper::get($data, "titles", []), Title::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "secondaryTitles", []), SecondaryTitle::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "descs", []), Desc::DOM_NODE_NAME, $model);
        $model->setCredits(static::deserializeCredits($data));
        $model->setDate(static::deserializeDate($data));
        static::deserializeArray(ArrayHelper::get($data, "categories", []), Category::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "keywords", []), Keyword::DOM_NODE_NAME, $model);
        $model->setLanguage(static::deserializeLanguage($data));
        $model->setOrigLanguage(static::deserializeOrigLanguage($data));
        $model->setLength(static::deserializeLength($data));
        static::deserializeArray(ArrayHelper::get($data, "icons", []), Icon::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "urls", []), Url::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "countries", []), Country::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "episodeNums", []), EpisodeNum::DOM_NODE_NAME, $model);
        $model->setVideo(static::deserializeVideo($data));
        $model->setAudio(static::deserializeAudio($data));
        $model->setPreviouslyShown(static::deserializePreviouslyShown($data));
        $model->setPremiere(static::deserializePremiere($data));
        $model->setLastChance(static::deserializeLastChance($data));
        $model->setNew(ArrayHelper::get($data, "new"));
        static::deserializeArray(ArrayHelper::get($data, "subtitles", []), Subtitles::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "ratings", []), Rating::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "starRatings", []), StarRating::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "reviews", []), Review::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a quality.
     *
     * @param array $data The data.
     * @return Quality Returns the quality.
     */
    public static function deserializeQuality(array $data): Quality {

        $model = new Quality();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a rating.
     *
     * @param array $data The data.
     * @return Rating Returns the rating.
     */
    public static function deserializeRating(array $data): Rating {

        $model = new Rating();
        $model->setSystem(ArrayHelper::get($data, "system"));
        $model->setValue(static::deserializeValue(ArrayHelper::get($data, "value", [])));
        static::deserializeArray(ArrayHelper::get($data, "icons", []), Icon::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a review.
     *
     * @param array $data The data.
     * @return Review Returns the review.
     */
    public static function deserializeReview(array $data): Review {

        $model = new Review();
        $model->setType(ArrayHelper::get($data, "type"));
        $model->setSource(ArrayHelper::get($data, "source"));
        $model->setReviewer(ArrayHelper::get($data, "reviewer"));
        $model->setLang(ArrayHelper::get($data, "lang"));

        return $model;
    }

    /**
     * Deserialize a secondary title.
     *
     * @param array $data The data.
     * @return SecondaryTitle Returns the secondary title.
     */
    public static function deserializeSecondaryTitle(array $data): SecondaryTitle {

        $model = new SecondaryTitle();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a star rating.
     *
     * @param array $data The data.
     * @return StarRating Returns the star rating.
     */
    public static function deserializeStarRating(array $data): StarRating {

        $model = new StarRating();
        $model->setValue(static::deserializeValue($data));
        static::deserializeArray(ArrayHelper::get($data, "icons", []), Icon::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a stereo.
     *
     * @param array $data The data.
     * @return Stereo Returns the stereo.
     */
    public static function deserializeStereo(array $data): Stereo {

        $model = new Stereo();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a subtitles.
     *
     * @param array $data The data.
     * @return Subtitles Returns the subtitles.
     */
    public static function deserializeSubtitles(array $data): Subtitles {

        $model = new Subtitles();
        $model->setType(ArrayHelper::get($data, "type"));
        $model->setLanguage(static::deserializeLanguage(ArrayHelper::get($data, "language", [])));

        return $model;
    }

    /**
     * Deserialize a title.
     *
     * @param array $data The data.
     * @return Title Returns the title.
     */
    public static function deserializeTitle(array $data): Title {

        $model = new Title();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a TV.
     *
     * @param array $data The data.
     * @return Tv Returns the TV.
     */
    public static function deserializeTv(array $data): Tv {

        $model = new Tv();
        $model->setDate(ArrayHelper::get($data, "date"));
        $model->setGeneratorInfoName(ArrayHelper::get($data, "generatorInfoName"));
        $model->setGeneratorInfoUrl(ArrayHelper::get($data, "generatorInfoUrl"));
        $model->setSourceDataUrl(ArrayHelper::get($data, "sourceDataUrl"));
        $model->setSourceInfoName(ArrayHelper::get($data, "sourceInfoName"));
        $model->setSourceInfoUrl(ArrayHelper::get($data, "sourceInfoUrl"));
        static::deserializeArray(ArrayHelper::get($data, "channels", []), Channel::DOM_NODE_NAME, $model);
        static::deserializeArray(ArrayHelper::get($data, "programmes", []), Programme::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a URL.
     *
     * @param array $data The data.
     * @return Url Returns the URL.
     */
    public static function deserializeUrl(array $data): Url {

        $model = new Url();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a value.
     *
     * @param array $data The data.
     * @return Value Returns the value.
     */
    public static function deserializeValue(array $data): Value {

        $model = new Value();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a video.
     *
     * @param array $data The data.
     * @return Video Returns the video.
     */
    public static function deserializeVideo(array $data): Video {

        $model = new Video();
        $model->setPresent(static::deserializePresent(ArrayHelper::get($data, "present", [])));
        $model->setColour(static::deserializeColour(ArrayHelper::get($data, "colour", [])));
        $model->setAspect(static::deserializeAspect(ArrayHelper::get($data, "aspect", [])));
        $model->setQuality(static::deserializeQuality(ArrayHelper::get($data, "quality", [])));

        return $model;
    }

    /**
     * Deserialize a writer.
     *
     * @param array $data The data.
     * @return Writer Returns the writer.
     */
    public static function deserializeWriter(array $data): Writer {

        $model = new Writer();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }
}