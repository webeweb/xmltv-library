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

use WBW\Library\XMLTV\Model\AbstractCredit;
use WBW\Library\XMLTV\Model\Actor;
use WBW\Library\XMLTV\Model\Aspect;
use WBW\Library\XMLTV\Model\Audio;
use WBW\Library\XMLTV\Model\Category;
use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Model\Colour;
use WBW\Library\XMLTV\Model\Country;
use WBW\Library\XMLTV\Model\Credits;
use WBW\Library\XMLTV\Model\Date;
use WBW\Library\XMLTV\Model\Desc;
use WBW\Library\XMLTV\Model\DisplayName;
use WBW\Library\XMLTV\Model\EpisodeNum;
use WBW\Library\XMLTV\Model\Icon;
use WBW\Library\XMLTV\Model\Keyword;
use WBW\Library\XMLTV\Model\Language;
use WBW\Library\XMLTV\Model\LastChance;
use WBW\Library\XMLTV\Model\Length;
use WBW\Library\XMLTV\Model\OrigLanguage;
use WBW\Library\XMLTV\Model\Premiere;
use WBW\Library\XMLTV\Model\Present;
use WBW\Library\XMLTV\Model\PreviouslyShown;
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

/**
 * JSON serializer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Serializer
 */
class JsonSerializer {

    /**
     * Serialize an actor.
     *
     * @param Actor $model The actor.
     * @return array Returns the serialized actor.
     */
    public static function serializeActor(Actor $model): array {
        return array_merge(JsonSerializer::serializeCredit($model), [
            SerializerKeys::ROLE => $model->getRole(),
        ]);
    }

    /**
     * Serialize an aspect.
     *
     * @param Aspect $model The aspect.
     * @return array Returns the serialized aspect.
     */
    public static function serializeAspect(Aspect $model): array {
        return [
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize an audio.
     *
     * @param Audio $model The audio.
     * @return array Returns the serialized audio.
     */
    public static function serializeAudio(Audio $model): array {
        return [
            SerializerKeys::PRESENT => SerializerHelper::jsonSerializeModel($model->getPresent()),
            SerializerKeys::STEREO  => SerializerHelper::jsonSerializeModel($model->getStereo()),
        ];
    }

    /**
     * Serialize a category.
     *
     * @param Category $model The category.
     * @return array Returns the serialized category.
     */
    public static function serializeCategory(Category $model): array {
        return [
            SerializerKeys::LANG    => $model->getLang(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a channel.
     *
     * @param Channel $model The channel.
     * @return array Returns the serialized channel.
     */
    public static function serializeChannel(Channel $model): array {
        return [
            SerializerKeys::ID            => $model->getId(),
            SerializerKeys::DISPLAY_NAMES => SerializerHelper::jsonSerializeArray($model->getDisplayNames()),
            SerializerKeys::ICONS         => SerializerHelper::jsonSerializeArray($model->getIcons()),
            SerializerKeys::URLS          => SerializerHelper::jsonSerializeArray($model->getUrls()),
        ];
    }

    /**
     * Serialize a colour.
     *
     * @param Colour $model The colour.
     * @return array Returns the serialized colour.
     */
    public static function serializeColour(Colour $model): array {
        return [
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a country.
     *
     * @param Country $model The country.
     * @return array Returns the serialized country.
     */
    public static function serializeCountry(Country $model): array {
        return [
            SerializerKeys::LANG    => $model->getLang(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a credit.
     *
     * @param AbstractCredit $model The credit.
     * @return array Returns the serialized credit.
     */
    public static function serializeCredit(AbstractCredit $model): array {
        return [
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a credits.
     *
     * @param Credits $model The credits.
     * @return array Returns the serialized credits.
     */
    public static function serializeCredits(Credits $model): array {
        return [
            SerializerKeys::DIRECTORS    => SerializerHelper::jsonSerializeArray($model->getDirectors()),
            SerializerKeys::ACTORS       => SerializerHelper::jsonSerializeArray($model->getActors()),
            SerializerKeys::WRITERS      => SerializerHelper::jsonSerializeArray($model->getWriters()),
            SerializerKeys::ADAPTERS     => SerializerHelper::jsonSerializeArray($model->getAdapters()),
            SerializerKeys::PRODUCERS    => SerializerHelper::jsonSerializeArray($model->getProducers()),
            SerializerKeys::COMPOSERS    => SerializerHelper::jsonSerializeArray($model->getComposers()),
            SerializerKeys::EDITORS      => SerializerHelper::jsonSerializeArray($model->getEditors()),
            SerializerKeys::PRESENTERS   => SerializerHelper::jsonSerializeArray($model->getPresenters()),
            SerializerKeys::COMMENTATORS => SerializerHelper::jsonSerializeArray($model->getCommentators()),
            SerializerKeys::GUESTS       => SerializerHelper::jsonSerializeArray($model->getGuests()),
        ];
    }

    /**
     * Serialize a date.
     *
     * @param Date $model The date.
     * @return array Returns the serialized date.
     */
    public static function serializeDate(Date $model): array {
        return [
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a desc.
     *
     * @param Desc $model The desc.
     * @return array Returns the serialized desc.
     */
    public static function serializeDesc(Desc $model): array {
        return [
            SerializerKeys::LANG    => $model->getLang(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a display name.
     *
     * @param DisplayName $model The display name.
     * @return array Returns the serialized display name.
     */
    public static function serializeDisplayName(DisplayName $model): array {
        return [
            SerializerKeys::LANG    => $model->getLang(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize an episode number.
     *
     * @param EpisodeNum $model The episode number.
     * @return array Returns the serialized episode num.
     */
    public static function serializeEpisodeNum(EpisodeNum $model): array {
        return [
            SerializerKeys::SYSTEM  => $model->getSystem(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize an icon.
     *
     * @param Icon $model The icon.
     * @return array Returns the serialized icon.
     */
    public static function serializeIcon(Icon $model): array {
        return [
            SerializerKeys::SRC    => $model->getSrc(),
            SerializerKeys::WIDTH  => $model->getWidth(),
            SerializerKeys::HEIGHT => $model->getHeight(),
        ];
    }

    /**
     * Serialize a keyword.
     *
     * @param Keyword $model The keyword.
     * @return array Returns the serialized keyword.
     */
    public static function serializeKeyword(Keyword $model): array {
        return [
            SerializerKeys::LANG    => $model->getLang(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a language.
     *
     * @param Language $model The language.
     * @return array Returns the serialized language.
     */
    public static function serializeLanguage(Language $model): array {
        return [
            SerializerKeys::LANG    => $model->getLang(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a last chance.
     *
     * @param LastChance $model The last chance.
     * @return array Returns the serialized last chance.
     */
    public static function serializeLastChance(LastChance $model): array {
        return [
            SerializerKeys::LANG    => $model->getLang(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a length.
     *
     * @param Length $model The length.
     * @return array Returns the serialized length.
     */
    public static function serializeLength(Length $model): array {
        return [
            SerializerKeys::UNITS   => $model->getUnits(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize an original language.
     *
     * @param OrigLanguage $model The original language.
     * @return array Returns the serialized original language.
     */
    public static function serializeOrigLanguage(OrigLanguage $model): array {
        return [
            SerializerKeys::LANG    => $model->getLang(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a premiere.
     *
     * @param Premiere $model The premiere.
     * @return array Returns the serialized premiere.
     */
    public static function serializePremiere(Premiere $model): array {
        return [
            SerializerKeys::LANG    => $model->getLang(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a present.
     *
     * @param Present $model The present.
     * @return array Returns the serialized present.
     */
    public static function serializePresent(Present $model): array {
        return [
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a previously shown.
     *
     * @param PreviouslyShown $model The previously shown.
     * @return array Returns the serialized previously shown.
     */
    public static function serializePreviouslyShown(PreviouslyShown $model): array {
        return [
            SerializerKeys::CHANNEL => $model->getChannel(),
            SerializerKeys::START   => $model->getStart(),
        ];
    }

    /**
     * Serialize a programme.
     *
     * @param Programme $model The programme.
     * @return array Returns the serialized programme.
     */
    public static function serializeProgramme(Programme $model): array {
        return [
            SerializerKeys::START            => $model->getStart(),
            SerializerKeys::STOP             => $model->getStop(),
            SerializerKeys::PDC_START        => $model->getPdcStart(),
            SerializerKeys::VPS_START        => $model->getVpsStart(),
            SerializerKeys::SHOW_VIEW        => $model->getShowView(),
            SerializerKeys::VIDEO_PLUS       => $model->getVideoPlus(),
            SerializerKeys::CHANNEL          => $model->getChannel(),
            SerializerKeys::CLUMP_IDX        => $model->getClumpIdx(),
            SerializerKeys::TITLES           => SerializerHelper::jsonSerializeArray($model->getTitles()),
            SerializerKeys::SECONDARY_TITLES => SerializerHelper::jsonSerializeArray($model->getSecondaryTitles()),
            SerializerKeys::DESCS            => SerializerHelper::jsonSerializeArray($model->getDescs()),
            SerializerKeys::CREDITS          => SerializerHelper::jsonSerializeModel($model->getCredits()),
            SerializerKeys::DATE             => SerializerHelper::jsonSerializeModel($model->getDate()),
            SerializerKeys::CATEGORIES       => SerializerHelper::jsonSerializeArray($model->getCategories()),
            SerializerKeys::KEYWORDS         => SerializerHelper::jsonSerializeArray($model->getKeywords()),
            SerializerKeys::LANGUAGE         => SerializerHelper::jsonSerializeModel($model->getLanguage()),
            SerializerKeys::ORIG_LANGUAGE    => SerializerHelper::jsonSerializeModel($model->getOrigLanguage()),
            SerializerKeys::LENGTH           => SerializerHelper::jsonSerializeModel($model->getLength()),
            SerializerKeys::ICONS            => SerializerHelper::jsonSerializeArray($model->getIcons()),
            SerializerKeys::URLS             => SerializerHelper::jsonSerializeArray($model->getUrls()),
            SerializerKeys::COUNTRIES        => SerializerHelper::jsonSerializeArray($model->getCountries()),
            SerializerKeys::EPISODE_NUMS     => SerializerHelper::jsonSerializeArray($model->getEpisodeNums()),
            SerializerKeys::VIDEO            => SerializerHelper::jsonSerializeModel($model->getVideo()),
            SerializerKeys::AUDIO            => SerializerHelper::jsonSerializeModel($model->getAudio()),
            SerializerKeys::PREVIOUSLY_SHOWN => SerializerHelper::jsonSerializeModel($model->getPreviouslyShown()),
            SerializerKeys::PREMIERE         => SerializerHelper::jsonSerializeModel($model->getPremiere()),
            SerializerKeys::LAST_CHANCE      => SerializerHelper::jsonSerializeModel($model->getLastChance()),
            SerializerKeys::NEW              => $model->getNew(),
            SerializerKeys::SUBTITLES        => SerializerHelper::jsonSerializeArray($model->getSubtitles()),
            SerializerKeys::RATINGS          => SerializerHelper::jsonSerializeArray($model->getRatings()),
            SerializerKeys::STAR_RATINGS     => SerializerHelper::jsonSerializeArray($model->getStarRatings()),
            SerializerKeys::REVIEWS          => SerializerHelper::jsonSerializeArray($model->getReviews()),
        ];
    }

    /**
     * Serialize a quality.
     *
     * @param Quality $model The quality.
     * @return array Returns the serialized quality.
     */
    public static function serializeQuality(Quality $model): array {
        return [
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a rating.
     *
     * @param Rating $model The rating.
     * @return array Returns the serialized rating.
     */
    public static function serializeRating(Rating $model): array {
        return [
            SerializerKeys::SYSTEM => $model->getSystem(),
            SerializerKeys::VALUE  => SerializerHelper::jsonSerializeModel($model->getValue()),
            SerializerKeys::ICONS  => SerializerHelper::jsonSerializeArray($model->getIcons()),
        ];
    }

    /**
     * Serialize a review.
     *
     * @param Review $model The review.
     * @return array Returns the serialized review.
     */
    public static function serializeReview(Review $model): array {
        return [
            SerializerKeys::TYPE     => $model->getType(),
            SerializerKeys::SOURCE   => $model->getSource(),
            SerializerKeys::REVIEWER => $model->getReviewer(),
            SerializerKeys::LANG     => $model->getLang(),
        ];
    }

    /**
     * Serialize a secondary title.
     *
     * @param SecondaryTitle $model The secondary title.
     * @return array Returns the serialized secondary title.
     */
    public static function serializeSecondaryTitle(SecondaryTitle $model): array {
        return [
            SerializerKeys::LANG    => $model->getLang(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a star rating.
     *
     * @param StarRating $model The star rating.
     * @return array Returns the serialized star rating.
     */
    public static function serializeStarRating(StarRating $model): array {
        return [
            SerializerKeys::VALUE => SerializerHelper::jsonSerializeModel($model->getValue()),
            SerializerKeys::ICONS => SerializerHelper::jsonSerializeArray($model->getIcons()),
        ];
    }

    /**
     * Serialize a stereo.
     *
     * @param Stereo $model The stereo.
     * @return array Returns the serialized stereo.
     */
    public static function serializeStereo(Stereo $model): array {
        return [
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a subtitles.
     *
     * @param Subtitles $model The subtitles.
     * @return array Returns the serialized subtitles.
     */
    public static function serializeSubtitles(Subtitles $model): array {
        return [
            SerializerKeys::TYPE     => $model->getType(),
            SerializerKeys::LANGUAGE => SerializerHelper::jsonSerializeModel($model->getLanguage()),
        ];
    }

    /**
     * Serialize a title.
     *
     * @param Title $model The title.
     * @return array Returns the serialized title.
     */
    public static function serializeTitle(Title $model): array {
        return [
            SerializerKeys::LANG    => $model->getLang(),
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a TV.
     *
     * @param Tv $model The TV.
     * @return array Returns the serialized TV.
     */
    public static function serializeTv(Tv $model): array {
        return [
            SerializerKeys::DATE                => $model->getDate(),
            SerializerKeys::GENERATOR_INFO_NAME => $model->getGeneratorInfoName(),
            SerializerKeys::GENERATOR_INFO_URL  => $model->getGeneratorInfoUrl(),
            SerializerKeys::SOURCE_DATA_URL     => $model->getSourceDataUrl(),
            SerializerKeys::SOURCE_INFO_NAME    => $model->getSourceInfoName(),
            SerializerKeys::SOURCE_INFO_URL     => $model->getSourceInfoUrl(),
            SerializerKeys::CHANNELS            => SerializerHelper::jsonSerializeArray($model->getChannels()),
            SerializerKeys::PROGRAMMES          => SerializerHelper::jsonSerializeArray($model->getProgrammes()),
        ];
    }

    /**
     * Serialize an URL.
     *
     * @param Url $model The URL.
     * @return array Returns the serialized URL.
     */
    public static function serializeUrl(Url $model): array {
        return [
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a value.
     *
     * @param Value $model The value.
     * @return array Returns the serialized value.
     */
    public static function serializeValue(Value $model): array {
        return [
            SerializerKeys::CONTENT => $model->getContent(),
        ];
    }

    /**
     * Serialize a video.
     *
     * @param Video $model The video.
     * @return array Returns the serialized video.
     */
    public static function serializeVideo(Video $model): array {
        return [
            SerializerKeys::PRESENT => SerializerHelper::jsonSerializeModel($model->getPresent()),
            SerializerKeys::COLOUR  => SerializerHelper::jsonSerializeModel($model->getColour()),
            SerializerKeys::ASPECT  => SerializerHelper::jsonSerializeModel($model->getAspect()),
            SerializerKeys::QUALITY => SerializerHelper::jsonSerializeModel($model->getQuality()),
        ];
    }
}
