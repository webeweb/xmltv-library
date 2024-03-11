<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Serializer;

use WBW\Library\Serializer\Helper\JsonSerializerHelper;
use WBW\Library\XmlTv\Model\AbstractCredit;
use WBW\Library\XmlTv\Model\Actor;
use WBW\Library\XmlTv\Model\Aspect;
use WBW\Library\XmlTv\Model\Audio;
use WBW\Library\XmlTv\Model\Category;
use WBW\Library\XmlTv\Model\Channel;
use WBW\Library\XmlTv\Model\Colour;
use WBW\Library\XmlTv\Model\Country;
use WBW\Library\XmlTv\Model\Credits;
use WBW\Library\XmlTv\Model\Date;
use WBW\Library\XmlTv\Model\Desc;
use WBW\Library\XmlTv\Model\DisplayName;
use WBW\Library\XmlTv\Model\EpisodeNum;
use WBW\Library\XmlTv\Model\Icon;
use WBW\Library\XmlTv\Model\Keyword;
use WBW\Library\XmlTv\Model\Language;
use WBW\Library\XmlTv\Model\LastChance;
use WBW\Library\XmlTv\Model\Length;
use WBW\Library\XmlTv\Model\OrigLanguage;
use WBW\Library\XmlTv\Model\Premiere;
use WBW\Library\XmlTv\Model\Present;
use WBW\Library\XmlTv\Model\PreviouslyShown;
use WBW\Library\XmlTv\Model\Programme;
use WBW\Library\XmlTv\Model\Quality;
use WBW\Library\XmlTv\Model\Rating;
use WBW\Library\XmlTv\Model\Review;
use WBW\Library\XmlTv\Model\SecondaryTitle;
use WBW\Library\XmlTv\Model\StarRating;
use WBW\Library\XmlTv\Model\Stereo;
use WBW\Library\XmlTv\Model\Subtitles;
use WBW\Library\XmlTv\Model\Title;
use WBW\Library\XmlTv\Model\Tv;
use WBW\Library\XmlTv\Model\Url;
use WBW\Library\XmlTv\Model\Value;
use WBW\Library\XmlTv\Model\Video;

/**
 * JSON serializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Serializer
 */
class JsonSerializer extends JsonSerializerHelper {

    /**
     * Serialize an actor.
     *
     * @param Actor $model The actor.
     * @return array<string,mixed> Returns the serialized actor.
     */
    public static function serializeActor(Actor $model): array {

        return array_merge(static::serializeCredit($model), [
            SerializerKeys::ROLE => $model->getRole(),
        ]);
    }

    /**
     * Serialize an aspect.
     *
     * @param Aspect $model The aspect.
     * @return array<string,mixed> Returns the serialized aspect.
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
     * @return array<string,mixed> Returns the serialized audio.
     */
    public static function serializeAudio(Audio $model): array {

        return [
            SerializerKeys::PRESENT => static::jsonSerializeModel($model->getPresent()),
            SerializerKeys::STEREO  => static::jsonSerializeModel($model->getStereo()),
        ];
    }

    /**
     * Serialize a category.
     *
     * @param Category $model The category.
     * @return array<string,mixed> Returns the serialized category.
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
     * @return array<string,mixed> Returns the serialized channel.
     */
    public static function serializeChannel(Channel $model): array {

        return [
            SerializerKeys::ID            => $model->getId(),
            SerializerKeys::DISPLAY_NAMES => static::jsonSerializeArray($model->getDisplayNames()),
            SerializerKeys::ICONS         => static::jsonSerializeArray($model->getIcons()),
            SerializerKeys::URLS          => static::jsonSerializeArray($model->getUrls()),
        ];
    }

    /**
     * Serialize a colour.
     *
     * @param Colour $model The colour.
     * @return array<string,mixed> Returns the serialized colour.
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
     * @return array<string,mixed> Returns the serialized country.
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
     * @return array<string,mixed> Returns the serialized credit.
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
     * @return array<string,mixed> Returns the serialized credits.
     */
    public static function serializeCredits(Credits $model): array {

        return [
            SerializerKeys::DIRECTORS    => static::jsonSerializeArray($model->getDirectors()),
            SerializerKeys::ACTORS       => static::jsonSerializeArray($model->getActors()),
            SerializerKeys::WRITERS      => static::jsonSerializeArray($model->getWriters()),
            SerializerKeys::ADAPTERS     => static::jsonSerializeArray($model->getAdapters()),
            SerializerKeys::PRODUCERS    => static::jsonSerializeArray($model->getProducers()),
            SerializerKeys::COMPOSERS    => static::jsonSerializeArray($model->getComposers()),
            SerializerKeys::EDITORS      => static::jsonSerializeArray($model->getEditors()),
            SerializerKeys::PRESENTERS   => static::jsonSerializeArray($model->getPresenters()),
            SerializerKeys::COMMENTATORS => static::jsonSerializeArray($model->getCommentators()),
            SerializerKeys::GUESTS       => static::jsonSerializeArray($model->getGuests()),
        ];
    }

    /**
     * Serialize a date.
     *
     * @param Date $model The date.
     * @return array<string,mixed> Returns the serialized date.
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
     * @return array<string,mixed> Returns the serialized desc.
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
     * @return array<string,mixed> Returns the serialized display name.
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
     * @return array<string,mixed> Returns the serialized episode num.
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
     * @return array<string,mixed> Returns the serialized icon.
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
     * @return array<string,mixed> Returns the serialized keyword.
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
     * @return array<string,mixed> Returns the serialized language.
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
     * @return array<string,mixed> Returns the serialized last chance.
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
     * @return array<string,mixed> Returns the serialized length.
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
     * @return array<string,mixed> Returns the serialized original language.
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
     * @return array<string,mixed> Returns the serialized premiere.
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
     * @return array<string,mixed> Returns the serialized present.
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
     * @return array<string,mixed> Returns the serialized previously shown.
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
     * @return array<string,mixed> Returns the serialized programme.
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
            SerializerKeys::TITLES           => static::jsonSerializeArray($model->getTitles()),
            SerializerKeys::SECONDARY_TITLES => static::jsonSerializeArray($model->getSecondaryTitles()),
            SerializerKeys::DESCS            => static::jsonSerializeArray($model->getDescs()),
            SerializerKeys::CREDITS          => static::jsonSerializeModel($model->getCredits()),
            SerializerKeys::DATE             => static::jsonSerializeModel($model->getDate()),
            SerializerKeys::CATEGORIES       => static::jsonSerializeArray($model->getCategories()),
            SerializerKeys::KEYWORDS         => static::jsonSerializeArray($model->getKeywords()),
            SerializerKeys::LANGUAGE         => static::jsonSerializeModel($model->getLanguage()),
            SerializerKeys::ORIG_LANGUAGE    => static::jsonSerializeModel($model->getOrigLanguage()),
            SerializerKeys::LENGTH           => static::jsonSerializeModel($model->getLength()),
            SerializerKeys::ICONS            => static::jsonSerializeArray($model->getIcons()),
            SerializerKeys::URLS             => static::jsonSerializeArray($model->getUrls()),
            SerializerKeys::COUNTRIES        => static::jsonSerializeArray($model->getCountries()),
            SerializerKeys::EPISODE_NUMS     => static::jsonSerializeArray($model->getEpisodeNums()),
            SerializerKeys::VIDEO            => static::jsonSerializeModel($model->getVideo()),
            SerializerKeys::AUDIO            => static::jsonSerializeModel($model->getAudio()),
            SerializerKeys::PREVIOUSLY_SHOWN => static::jsonSerializeModel($model->getPreviouslyShown()),
            SerializerKeys::PREMIERE         => static::jsonSerializeModel($model->getPremiere()),
            SerializerKeys::LAST_CHANCE      => static::jsonSerializeModel($model->getLastChance()),
            SerializerKeys::NEW              => $model->getNew(),
            SerializerKeys::SUBTITLES        => static::jsonSerializeArray($model->getSubtitles()),
            SerializerKeys::RATINGS          => static::jsonSerializeArray($model->getRatings()),
            SerializerKeys::STAR_RATINGS     => static::jsonSerializeArray($model->getStarRatings()),
            SerializerKeys::REVIEWS          => static::jsonSerializeArray($model->getReviews()),
        ];
    }

    /**
     * Serialize a quality.
     *
     * @param Quality $model The quality.
     * @return array<string,mixed> Returns the serialized quality.
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
     * @return array<string,mixed> Returns the serialized rating.
     */
    public static function serializeRating(Rating $model): array {

        return [
            SerializerKeys::SYSTEM => $model->getSystem(),
            SerializerKeys::VALUE  => static::jsonSerializeModel($model->getValue()),
            SerializerKeys::ICONS  => static::jsonSerializeArray($model->getIcons()),
        ];
    }

    /**
     * Serialize a review.
     *
     * @param Review $model The review.
     * @return array<string,mixed> Returns the serialized review.
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
     * @return array<string,mixed> Returns the serialized secondary title.
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
     * @return array<string,mixed> Returns the serialized star rating.
     */
    public static function serializeStarRating(StarRating $model): array {

        return [
            SerializerKeys::VALUE => static::jsonSerializeModel($model->getValue()),
            SerializerKeys::ICONS => static::jsonSerializeArray($model->getIcons()),
        ];
    }

    /**
     * Serialize a stereo.
     *
     * @param Stereo $model The stereo.
     * @return array<string,mixed> Returns the serialized stereo.
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
     * @return array<string,mixed> Returns the serialized subtitles.
     */
    public static function serializeSubtitles(Subtitles $model): array {

        return [
            SerializerKeys::TYPE     => $model->getType(),
            SerializerKeys::LANGUAGE => static::jsonSerializeModel($model->getLanguage()),
        ];
    }

    /**
     * Serialize a title.
     *
     * @param Title $model The title.
     * @return array<string,mixed> Returns the serialized title.
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
     * @return array<string,mixed> Returns the serialized TV.
     */
    public static function serializeTv(Tv $model): array {

        return [
            SerializerKeys::DATE                => $model->getDate(),
            SerializerKeys::GENERATOR_INFO_NAME => $model->getGeneratorInfoName(),
            SerializerKeys::GENERATOR_INFO_URL  => $model->getGeneratorInfoUrl(),
            SerializerKeys::SOURCE_DATA_URL     => $model->getSourceDataUrl(),
            SerializerKeys::SOURCE_INFO_NAME    => $model->getSourceInfoName(),
            SerializerKeys::SOURCE_INFO_URL     => $model->getSourceInfoUrl(),
            SerializerKeys::CHANNELS            => static::jsonSerializeArray($model->getChannels()),
            SerializerKeys::PROGRAMMES          => static::jsonSerializeArray($model->getProgrammes()),
        ];
    }

    /**
     * Serialize an URL.
     *
     * @param Url $model The URL.
     * @return array<string,mixed> Returns the serialized URL.
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
     * @return array<string,mixed> Returns the serialized value.
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
     * @return array<string,mixed> Returns the serialized video.
     */
    public static function serializeVideo(Video $model): array {

        return [
            SerializerKeys::PRESENT => static::jsonSerializeModel($model->getPresent()),
            SerializerKeys::COLOUR  => static::jsonSerializeModel($model->getColour()),
            SerializerKeys::ASPECT  => static::jsonSerializeModel($model->getAspect()),
            SerializerKeys::QUALITY => static::jsonSerializeModel($model->getQuality()),
        ];
    }
}
