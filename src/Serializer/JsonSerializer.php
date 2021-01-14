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
        return array_merge(["role" => $model->getRole()], JsonSerializer::serializeCredit($model));
    }

    /**
     * Serialize an aspect.
     *
     * @param Aspect $model The aspect.
     * @return array Returns the serialized aspect.
     */
    public static function serializeAspect(Aspect $model): array {
        return [
            "content" => $model->getContent(),
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
            "present" => SerializerHelper::jsonSerializeModel($model->getPresent()),
            "stereo"  => SerializerHelper::jsonSerializeModel($model->getStereo()),
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
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
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
            "id"           => $model->getId(),
            "displayNames" => SerializerHelper::jsonSerializeArray($model->getDisplayNames()),
            "icons"        => SerializerHelper::jsonSerializeArray($model->getIcons()),
            "urls"         => SerializerHelper::jsonSerializeArray($model->getUrls()),
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
            "content" => $model->getContent(),
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
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
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
            "content" => $model->getContent(),
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
            "directors"    => SerializerHelper::jsonSerializeArray($model->getDirectors()),
            "actors"       => SerializerHelper::jsonSerializeArray($model->getActors()),
            "writers"      => SerializerHelper::jsonSerializeArray($model->getWriters()),
            "adapters"     => SerializerHelper::jsonSerializeArray($model->getAdapters()),
            "producers"    => SerializerHelper::jsonSerializeArray($model->getProducers()),
            "composers"    => SerializerHelper::jsonSerializeArray($model->getComposers()),
            "editors"      => SerializerHelper::jsonSerializeArray($model->getEditors()),
            "presenters"   => SerializerHelper::jsonSerializeArray($model->getPresenters()),
            "commentators" => SerializerHelper::jsonSerializeArray($model->getCommentators()),
            "guests"       => SerializerHelper::jsonSerializeArray($model->getGuests()),
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
            "content" => $model->getContent(),
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
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
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
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
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
            "system"  => $model->getSystem(),
            "content" => $model->getContent(),
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
            "src"    => $model->getSrc(),
            "width"  => $model->getWidth(),
            "height" => $model->getHeight(),
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
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
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
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
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
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
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
            "units"   => $model->getUnits(),
            "content" => $model->getContent(),
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
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
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
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
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
            "content" => $model->getContent(),
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
            "channel" => $model->getChannel(),
            "start"   => $model->getStart(),
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
            "start"           => $model->getStart(),
            "stop"            => $model->getStop(),
            "pdcStart"        => $model->getPdcStart(),
            "vpsStart"        => $model->getVpsStart(),
            "showView"        => $model->getShowView(),
            "videoPlus"       => $model->getVideoPlus(),
            "channel"         => $model->getChannel(),
            "clumpIdx"        => $model->getClumpIdx(),
            "titles"          => SerializerHelper::jsonSerializeArray($model->getTitles()),
            "secondaryTitles" => SerializerHelper::jsonSerializeArray($model->getSecondaryTitles()),
            "descs"           => SerializerHelper::jsonSerializeArray($model->getDescs()),
            "credits"         => SerializerHelper::jsonSerializeModel($model->getCredits()),
            "date"            => SerializerHelper::jsonSerializeModel($model->getDate()),
            "categories"      => SerializerHelper::jsonSerializeArray($model->getCategories()),
            "keywords"        => SerializerHelper::jsonSerializeArray($model->getKeywords()),
            "language"        => SerializerHelper::jsonSerializeModel($model->getLanguage()),
            "origLanguage"    => SerializerHelper::jsonSerializeModel($model->getOrigLanguage()),
            "length"          => SerializerHelper::jsonSerializeModel($model->getLength()),
            "icons"           => SerializerHelper::jsonSerializeArray($model->getIcons()),
            "urls"            => SerializerHelper::jsonSerializeArray($model->getUrls()),
            "countries"       => SerializerHelper::jsonSerializeArray($model->getCountries()),
            "episodeNums"     => SerializerHelper::jsonSerializeArray($model->getEpisodeNums()),
            "video"           => SerializerHelper::jsonSerializeModel($model->getVideo()),
            "audio"           => SerializerHelper::jsonSerializeModel($model->getAudio()),
            "previouslyShown" => SerializerHelper::jsonSerializeModel($model->getPreviouslyShown()),
            "premiere"        => SerializerHelper::jsonSerializeModel($model->getPremiere()),
            "lastChance"      => SerializerHelper::jsonSerializeModel($model->getLastChance()),
            "new"             => $model->getNew(),
            "subtitles"       => SerializerHelper::jsonSerializeArray($model->getSubtitles()),
            "ratings"         => SerializerHelper::jsonSerializeArray($model->getRatings()),
            "starRatings"     => SerializerHelper::jsonSerializeArray($model->getStarRatings()),
            "reviews"         => SerializerHelper::jsonSerializeArray($model->getReviews()),
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
            "content" => $model->getContent(),
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
            "system" => $model->getSystem(),
            "value"  => SerializerHelper::jsonSerializeModel($model->getValue()),
            "icons"  => SerializerHelper::jsonSerializeArray($model->getIcons()),
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
            "type"     => $model->getType(),
            "source"   => $model->getSource(),
            "reviewer" => $model->getReviewer(),
            "lang"     => $model->getLang(),
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
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
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
            "value" => SerializerHelper::jsonSerializeModel($model->getValue()),
            "icons" => SerializerHelper::jsonSerializeArray($model->getIcons()),
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
            "content" => $model->getContent(),
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
            "type"     => $model->getType(),
            "language" => SerializerHelper::jsonSerializeModel($model->getLanguage()),
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
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
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
            "date"              => $model->getDate(),
            "generatorInfoName" => $model->getGeneratorInfoName(),
            "generatorInfoUrl"  => $model->getGeneratorInfoUrl(),
            "sourceDataUrl"     => $model->getSourceDataUrl(),
            "sourceInfoName"    => $model->getSourceInfoName(),
            "sourceInfoUrl"     => $model->getSourceInfoUrl(),
            "channels"          => SerializerHelper::jsonSerializeArray($model->getChannels()),
            "programmes"        => SerializerHelper::jsonSerializeArray($model->getProgrammes()),
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
            "content" => $model->getContent(),
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
            "content" => $model->getContent(),
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
            "present" => SerializerHelper::jsonSerializeModel($model->getPresent()),
            "colour"  => SerializerHelper::jsonSerializeModel($model->getColour()),
            "aspect"  => SerializerHelper::jsonSerializeModel($model->getAspect()),
            "quality" => SerializerHelper::jsonSerializeModel($model->getQuality()),
        ];
    }
}
