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
        $model->setRole(ArrayHelper::get($data, SerializerKeys::ROLE));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setLang(ArrayHelper::get($data, SerializerKeys::LANG));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setId(ArrayHelper::get($data, SerializerKeys::ID));
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::DISPLAY_NAMES, []), DisplayName::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::ICONS, []), Icon::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::URLS, []), Url::DOM_NODE_NAME, $model);

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setLang(ArrayHelper::get($data, SerializerKeys::LANG));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::DIRECTORS, []), Director::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::ACTORS, []), Actor::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::WRITERS, []), Writer::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::ADAPTERS, []), Adapter::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::PRODUCERS, []), Producer::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::COMPOSERS, []), Composer::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::EDITORS, []), Editor::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::PRESENTERS, []), Presenter::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::COMMENTATORS, []), Commentator::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::GUESTS, []), Guest::DOM_NODE_NAME, $model);

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setLang(ArrayHelper::get($data, SerializerKeys::LANG));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setLang(ArrayHelper::get($data, SerializerKeys::LANG));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setSystem(ArrayHelper::get($data, SerializerKeys::SYSTEM));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setSrc(ArrayHelper::get($data, SerializerKeys::SRC));
        $model->setWidth(ArrayHelper::get($data, SerializerKeys::WIDTH));
        $model->setHeight(ArrayHelper::get($data, SerializerKeys::HEIGHT));

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
        $model->setLang(ArrayHelper::get($data, SerializerKeys::LANG));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setLang(ArrayHelper::get($data, SerializerKeys::LANG));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setLang(ArrayHelper::get($data, SerializerKeys::LANG));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setUnits(ArrayHelper::get($data, SerializerKeys::UNITS));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setLang(ArrayHelper::get($data, SerializerKeys::LANG));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setLang(ArrayHelper::get($data, SerializerKeys::LANG));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setChannel(ArrayHelper::get($data, SerializerKeys::CHANNEL));
        $model->setStart(ArrayHelper::get($data, SerializerKeys::START));

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setStart(ArrayHelper::get($data, SerializerKeys::START));
        $model->setStop(ArrayHelper::get($data, SerializerKeys::STOP));
        $model->setPdcStart(ArrayHelper::get($data, SerializerKeys::PDC_START));
        $model->setVpsStart(ArrayHelper::get($data, SerializerKeys::VPS_START));
        $model->setShowView(ArrayHelper::get($data, SerializerKeys::SHOW_VIEW));
        $model->setVideoPlus(ArrayHelper::get($data, SerializerKeys::VIDEO_PLUS));
        $model->setChannel(ArrayHelper::get($data, SerializerKeys::CHANNEL));
        $model->setClumpIdx(ArrayHelper::get($data, SerializerKeys::CLUMP_IDX));
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::TITLES, []), Title::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::SECONDARY_TITLES, []), SecondaryTitle::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::DESCS, []), Desc::DOM_NODE_NAME, $model);
        $model->setCredits(JsonDeserializer::deserializeCredits($data));
        SerializerHelper::jsonDeserializeModel($data, SerializerKeys::DATE, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::CATEGORIES, []), Category::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::KEYWORDS, []), Keyword::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeModel($data, SerializerKeys::LANGUAGE, $model);
        SerializerHelper::jsonDeserializeModel($data, SerializerKeys::ORIG_LANGUAGE, $model);
        SerializerHelper::jsonDeserializeModel($data, SerializerKeys::LENGTH, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::ICONS, []), Icon::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::URLS, []), Url::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::COUNTRIES, []), Country::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::EPISODE_NUMS, []), EpisodeNum::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeModel($data, SerializerKeys::VIDEO, $model);
        SerializerHelper::jsonDeserializeModel($data, SerializerKeys::AUDIO, $model);
        SerializerHelper::jsonDeserializeModel($data, SerializerKeys::PREVIOUSLY_SHOWN, $model);
        SerializerHelper::jsonDeserializeModel($data, SerializerKeys::PREMIERE, $model);
        SerializerHelper::jsonDeserializeModel($data, SerializerKeys::LAST_CHANCE, $model);
        $model->setNew(ArrayHelper::get($data, SerializerKeys::NEW));
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::SUBTITLES, []), Subtitles::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::RATINGS, []), Rating::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::STAR_RATINGS, []), StarRating::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::REVIEWS, []), Review::DOM_NODE_NAME, $model);

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setSystem(ArrayHelper::get($data, SerializerKeys::SYSTEM));
        SerializerHelper::jsonDeserializeModel($data, Value::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::ICONS, []), Icon::DOM_NODE_NAME, $model);

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
        $model->setType(ArrayHelper::get($data, SerializerKeys::TYPE));
        $model->setSource(ArrayHelper::get($data, SerializerKeys::SOURCE));
        $model->setReviewer(ArrayHelper::get($data, SerializerKeys::REVIEWER));
        $model->setLang(ArrayHelper::get($data, SerializerKeys::LANG));

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
        $model->setLang(ArrayHelper::get($data, SerializerKeys::LANG));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::ICONS, []), Icon::DOM_NODE_NAME, $model);

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setType(ArrayHelper::get($data, SerializerKeys::TYPE));
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
        $model->setLang(ArrayHelper::get($data, SerializerKeys::LANG));
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setDate(ArrayHelper::get($data, SerializerKeys::DATE));
        $model->setGeneratorInfoName(ArrayHelper::get($data, SerializerKeys::GENERATOR_INFO_NAME));
        $model->setGeneratorInfoUrl(ArrayHelper::get($data, SerializerKeys::GENERATOR_INFO_URL));
        $model->setSourceDataUrl(ArrayHelper::get($data, SerializerKeys::SOURCE_DATA_URL));
        $model->setSourceInfoName(ArrayHelper::get($data, SerializerKeys::SOURCE_INFO_NAME));
        $model->setSourceInfoUrl(ArrayHelper::get($data, SerializerKeys::SOURCE_INFO_URL));
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::CHANNELS, []), Channel::DOM_NODE_NAME, $model);
        SerializerHelper::jsonDeserializeArray(ArrayHelper::get($data, SerializerKeys::PROGRAMMES, []), Programme::DOM_NODE_NAME, $model);

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

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
        $model->setContent(ArrayHelper::get($data, SerializerKeys::CONTENT));

        return $model;
    }
}