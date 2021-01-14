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
     * @return Actor|null Returns the actor in case of success, null otherwise.
     */
    public static function deserializeActor(array $data): ?Actor {

        $model = new Actor();
        $model->setRole(ArrayHelper::get($data, "role"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize an adapter.
     *
     * @param array $data The data.
     * @return Adapter|null Returns the adapter in case of success, null otherwise.
     */
    public static function deserializeAdapter(array $data): ?Adapter {

        $model = new Adapter();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize an aspect.
     *
     * @param array $data The data.
     * @return Aspect|null Returns the aspect in case of success, null otherwise.
     */
    public static function deserializeAspect(array $data): ?Aspect {

        $model = new Aspect();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize an audio.
     *
     * @param array $data The data.
     * @return Audio|null Returns the audio in case of success, null otherwise.
     */
    public static function deserializeAudio(array $data): ?Audio {

        $model = new Audio();
        SerializerHelper::jsonDeserializeModel($data, Present::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeModel($data, Stereo::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a category.
     *
     * @param array $data The data.
     * @return Category|null Returns the category in case of success, null otherwise.
     */
    public static function deserializeCategory(array $data): ?Category {

        $model = new Category();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a channel.
     *
     * @param array $data The data.
     * @return Channel|null Returns the channel in case of success, null otherwise.
     */
    public static function deserializeChannel(array $data): ?Channel {

        $model = new Channel();
        $model->setId(ArrayHelper::get($data, "id"));
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "displayNames", []), DisplayName::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "icons", []), Icon::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "urls", []), Url::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a colour.
     *
     * @param array $data The data.
     * @return Colour|null Returns the colour in case of success, null otherwise.
     */
    public static function deserializeColour(array $data): ?Colour {

        $model = new Colour();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a commentator.
     *
     * @param array $data The data.
     * @return Commentator|null Returns the commentator in case of success, null otherwise.
     */
    public static function deserializeCommentator(array $data): ?Commentator {

        $model = new Commentator();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a composer.
     *
     * @param array $data The data.
     * @return Composer|null Returns the composer in case of success, null otherwise.
     */
    public static function deserializeComposer(array $data): ?Composer {

        $model = new Composer();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a country.
     *
     * @param array $data The data.
     * @return Country|null Returns the country in case of success, null otherwise.
     */
    public static function deserializeCountry(array $data): ?Country {

        $model = new Country();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize the credits.
     *
     * @param array $data The data.
     * @return Credits|null Returns the credits in case of success, null otherwise.
     */
    public static function deserializeCredits(array $data): ?Credits {

        $model = new Credits();
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "directors", []), Director::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "actors", []), Actor::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "writers", []), Writer::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "adapters", []), Adapter::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "producers", []), Producer::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "composers", []), Composer::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "editors", []), Editor::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "presenters", []), Presenter::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "commentators", []), Commentator::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "guests", []), Guest::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a date.
     *
     * @param array $data The data.
     * @return Date|null Returns the date in case of success, null otherwise.
     */
    public static function deserializeDate(array $data): ?Date {

        $model = new Date();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a description.
     *
     * @param array $data The data.
     * @return Desc|null Returns the description in case of success, null otherwise.
     */
    public static function deserializeDesc(array $data): ?Desc {

        $model = new Desc();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a director.
     *
     * @param array $data The data.
     * @return Director|null Returns the director in case of success, null otherwise.
     */
    public static function deserializeDirector(array $data): ?Director {

        $model = new Director();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a display name.
     *
     * @param array $data The data.
     * @return DisplayName|null Returns the display name in case of success, null otherwise.
     */
    public static function deserializeDisplayName(array $data): ?DisplayName {

        $model = new DisplayName();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize an editor.
     *
     * @param array $data The data.
     * @return Editor|null Returns the editor in case of success, null otherwise.
     */
    public static function deserializeEditor(array $data): ?Editor {

        $model = new Editor();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a episode number.
     *
     * @param array $data The data.
     * @return EpisodeNum|null Returns the episode number in case of success, null otherwise.
     */
    public static function deserializeEpisodeNum(array $data): ?EpisodeNum {

        $model = new EpisodeNum();
        $model->setSystem(ArrayHelper::get($data, "system"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a guest.
     *
     * @param array $data The data.
     * @return Guest|null Returns the guest in case of success, null otherwise.
     */
    public static function deserializeGuest(array $data): ?Guest {

        $model = new Guest();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a icon.
     *
     * @param array $data The data.
     * @return Icon|null Returns the icon in case of success, null otherwise.
     */
    public static function deserializeIcon(array $data): ?Icon {

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
     * @return Keyword|null Returns the keyword in case of success, null otherwise.
     */
    public static function deserializeKeyword(array $data): ?Keyword {

        $model = new Keyword();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a language.
     *
     * @param array $data The data.
     * @return Language|null Returns the language in case of success, null otherwise.
     */
    public static function deserializeLanguage(array $data): ?Language {

        $model = new Language();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a last chance.
     *
     * @param array $data The data.
     * @return LastChance|null Returns the last chance in case of success, null otherwise.
     */
    public static function deserializeLastChance(array $data): ?LastChance {

        $model = new LastChance();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a length.
     *
     * @param array $data The data.
     * @return Length|null Returns the length in case of success, null otherwise.
     */
    public static function deserializeLength(array $data): ?Length {

        $model = new Length();
        $model->setUnits(ArrayHelper::get($data, "units"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize an original language.
     *
     * @param array $data The data.
     * @return OrigLanguage|null Returns the original language in case of success, null otherwise.
     */
    public static function deserializeOrigLanguage(array $data): ?OrigLanguage {

        $model = new OrigLanguage();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a premiere.
     *
     * @param array $data The data.
     * @return Premiere|null Returns the premiere in case of success, null otherwise.
     */
    public static function deserializePremiere(array $data): ?Premiere {

        $model = new Premiere();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a present.
     *
     * @param array $data The data.
     * @return Present|null Returns the present in case of success, null otherwise.
     */
    public static function deserializePresent(array $data): ?Present {

        $model = new Present();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a presenter.
     *
     * @param array $data The data.
     * @return Presenter|null Returns the presenter in case of success, null otherwise.
     */
    public static function deserializePresenter(array $data): ?Presenter {

        $model = new Presenter();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a previously shown.
     *
     * @param array $data The data.
     * @return PreviouslyShown|null Returns the previously shown in case of success, null otherwise.
     */
    public static function deserializePreviouslyShown(array $data): ?PreviouslyShown {

        $model = new PreviouslyShown();
        $model->setChannel(ArrayHelper::get($data, "channel"));
        $model->setStart(ArrayHelper::get($data, "start"));

        return $model;
    }

    /**
     * Deserialize a producer.
     *
     * @param array $data The data.
     * @return Producer|null Returns the producer in case of success, null otherwise.
     */
    public static function deserializeProducer(array $data): ?Producer {

        $model = new Producer();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a programme.
     *
     * @param array $data The data.
     * @return Programme|null Returns the programme in case of success, null otherwise.
     */
    public static function deserializeProgramme(array $data): ?Programme {

        $model = new Programme();
        $model->setStart(ArrayHelper::get($data, "start"));
        $model->setStop(ArrayHelper::get($data, "stop"));
        $model->setPdcStart(ArrayHelper::get($data, "pdcStart"));
        $model->setVpsStart(ArrayHelper::get($data, "vpsStart"));
        $model->setShowView(ArrayHelper::get($data, "showView"));
        $model->setVideoPlus(ArrayHelper::get($data, "videoPlus"));
        $model->setChannel(ArrayHelper::get($data, "channel"));
        $model->setClumpIdx(ArrayHelper::get($data, "clumpIdx"));
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "titles", []), Title::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "secondaryTitles", []), SecondaryTitle::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "descs", []), Desc::DOM_NODE_NAME, $model);
        $model->setCredits(JsonDeserializer::deserializeCredits($data));
        SerializerHelper::jsonDeserializeModel($data, Date::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "categories", []), Category::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "keywords", []), Keyword::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeModel($data, Language::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeModel($data, "origLanguage", $model);
        SerializerHelper::jsonDeserializeModel($data, Length::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "icons", []), Icon::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "urls", []), Url::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "countries", []), Country::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "episodeNums", []), EpisodeNum::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeModel($data, Video::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeModel($data, Audio::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeModel($data, "previouslyShown", $model);
        SerializerHelper::jsonDeserializeModel($data, Premiere::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeModel($data, "lastChance", $model);
        $model->setNew(ArrayHelper::get($data, "new"));
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "subtitles", []), Subtitles::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "ratings", []), Rating::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "starRatings", []), StarRating::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "reviews", []), Review::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a quality.
     *
     * @param array $data The data.
     * @return Quality|null Returns the quality in case of success, null otherwise.
     */
    public static function deserializeQuality(array $data): ?Quality {

        $model = new Quality();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a rating.
     *
     * @param array $data The data.
     * @return Rating|null Returns the rating in case of success, null otherwise.
     */
    public static function deserializeRating(array $data): ?Rating {

        $model = new Rating();
        $model->setSystem(ArrayHelper::get($data, "system"));
        SerializerHelper::jsonDeserializeModel($data, Value::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "icons", []), Icon::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a review.
     *
     * @param array $data The data.
     * @return Review|null Returns the review in case of success, null otherwise.
     */
    public static function deserializeReview(array $data): ?Review {

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
     * @return SecondaryTitle|null Returns the secondary title in case of success, null otherwise.
     */
    public static function deserializeSecondaryTitle(array $data): ?SecondaryTitle {

        $model = new SecondaryTitle();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a star rating.
     *
     * @param array $data The data.
     * @return StarRating|null Returns the star rating in case of success, null otherwise.
     */
    public static function deserializeStarRating(array $data): ?StarRating {

        $model = new StarRating();
        SerializerHelper::jsonDeserializeModel($data, Value::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "icons", []), Icon::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a stereo.
     *
     * @param array $data The data.
     * @return Stereo|null Returns the stereo in case of success, null otherwise.
     */
    public static function deserializeStereo(array $data): ?Stereo {

        $model = new Stereo();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a subtitles.
     *
     * @param array $data The data.
     * @return Subtitles|null Returns the subtitles in case of success, null otherwise.
     */
    public static function deserializeSubtitles(array $data): ?Subtitles {

        $model = new Subtitles();
        $model->setType(ArrayHelper::get($data, "type"));
        SerializerHelper::jsonDeserializeModel($data, Language::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a title.
     *
     * @param array $data The data.
     * @return Title|null Returns the title in case of success, null otherwise.
     */
    public static function deserializeTitle(array $data): ?Title {

        $model = new Title();
        $model->setLang(ArrayHelper::get($data, "lang"));
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a TV.
     *
     * @param array $data The data.
     * @return Tv|null Returns the TV in case of success, null otherwise.
     */
    public static function deserializeTv(array $data): ?Tv {

        $model = new Tv();
        $model->setDate(ArrayHelper::get($data, "date"));
        $model->setGeneratorInfoName(ArrayHelper::get($data, "generatorInfoName"));
        $model->setGeneratorInfoUrl(ArrayHelper::get($data, "generatorInfoUrl"));
        $model->setSourceDataUrl(ArrayHelper::get($data, "sourceDataUrl"));
        $model->setSourceInfoName(ArrayHelper::get($data, "sourceInfoName"));
        $model->setSourceInfoUrl(ArrayHelper::get($data, "sourceInfoUrl"));
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "channels", []), Channel::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, "programmes", []), Programme::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a URL.
     *
     * @param array $data The data.
     * @return Url|null Returns the URL in case of success, null otherwise.
     */
    public static function deserializeUrl(array $data): ?Url {

        $model = new Url();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a value.
     *
     * @param array $data The data.
     * @return Value|null Returns the value in case of success, null otherwise.
     */
    public static function deserializeValue(array $data): ?Value {

        $model = new Value();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }

    /**
     * Deserialize a video.
     *
     * @param array $data The data.
     * @return Video|null Returns the video in case of success, null otherwise.
     */
    public static function deserializeVideo(array $data): ?Video {

        $model = new Video();
        SerializerHelper::jsonDeserializeModel($data, Present::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeModel($data, Colour::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeModel($data, Aspect::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeModel($data, Quality::DOM_NODE_NAME, $model);

        return $model;
    }

    /**
     * Deserialize a writer.
     *
     * @param array $data The data.
     * @return Writer|null Returns the writer in case of success, null otherwise.
     */
    public static function deserializeWriter(array $data): ?Writer {

        $model = new Writer();
        $model->setContent(ArrayHelper::get($data, "content"));

        return $model;
    }
}