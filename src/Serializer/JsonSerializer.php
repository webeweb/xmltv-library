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
use WBW\Library\XMLTV\Model\AbstractModel;
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
    public static function serializeActor(Actor $model) {

        $output = JsonSerializer::serializeCredit($model);

        $output["role"] = $model->getRole();

        return $output;
    }

    /**
     * Serialize an array.
     *
     * @param AbstractModel[] $models The models.
     * @return array Returns the serialized array.
     */
    protected static function serializeArray(array $models) {

        $output = [];

        foreach ($models as $current) {
            $output[] = static::serializeModel($current);
        }

        return $output;
    }

    /**
     * Serialize an aspect.
     *
     * @param Aspect $model The aspect.
     * @return array Returns the serialized aspect.
     */
    public static function serializeAspect(Aspect $model) {
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
    public static function serializeAudio(Audio $model) {
        return [
            "present" => JsonSerializer::serializeModel($model->getPresent()),
            "stereo"  => JsonSerializer::serializeModel($model->getStereo()),
        ];
    }

    /**
     * Serialize a category.
     *
     * @param Category $model The category.
     * @return array Returns the serialized category.
     */
    public static function serializeCategory(Category $model) {
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
    public static function serializeChannel(Channel $model) {
        return [
            "id"           => $model->getId(),
            "displayNames" => JsonSerializer::serializeArray($model->getDisplayNames()),
            "icons"        => JsonSerializer::serializeArray($model->getIcons()),
            "urls"         => JsonSerializer::serializeArray($model->getUrls()),
        ];
    }

    /**
     * Serialize a colour.
     *
     * @param Colour $model The colour.
     * @return array Returns the serialized colour.
     */
    public static function serializeColour(Colour $model) {
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
    public static function serializeCountry(Country $model) {
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
    public static function serializeCredit(AbstractCredit $model) {
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
    public static function serializeCredits(Credits $model) {
        return [
            "directors"    => static::serializeArray($model->getDirectors()),
            "actors"       => static::serializeArray($model->getActors()),
            "writers"      => static::serializeArray($model->getWriters()),
            "adapters"     => static::serializeArray($model->getAdapters()),
            "producers"    => static::serializeArray($model->getProducers()),
            "composers"    => static::serializeArray($model->getComposers()),
            "editors"      => static::serializeArray($model->getEditors()),
            "presenters"   => static::serializeArray($model->getPresenters()),
            "commentators" => static::serializeArray($model->getCommentators()),
            "guests"       => static::serializeArray($model->getGuests()),
        ];
    }

    /**
     * Serialize a date.
     *
     * @param Date $model The date.
     * @return array Returns the serialized date.
     */
    public static function serializeDate(Date $model) {
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
    public static function serializeDesc(Desc $model) {
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
    public static function serializeDisplayName(DisplayName $model) {
        return [
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
        ];
    }

    /**
     * Serialize an episode num.
     *
     * @param EpisodeNum $model The episode num.
     * @return array Returns the serialized episode num.
     */
    public static function serializeEpisodeNum(EpisodeNum $model) {
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
    public static function serializeIcon(Icon $model) {
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
    public static function serializeKeyword(Keyword $model) {
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
    public static function serializeLanguage(Language $model) {
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
    public static function serializeLastChance(LastChance $model) {
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
    public static function serializeLength(Length $model) {
        return [
            "units"   => $model->getUnits(),
            "content" => $model->getContent(),
        ];
    }

    /**
     * Serialize a model.
     *
     * @param AbstractModel|null $model The model.
     * @return array Returns the serialized model.
     */
    protected static function serializeModel(AbstractModel $model = null) {

        if (null === $model) {
            return null;
        }

        return $model->jsonSerialize();
    }

    /**
     * Serialize an original language.
     *
     * @param OrigLanguage $model The original language.
     * @return array Returns the serialized original language.
     */
    public static function serializeOrigLanguage(OrigLanguage $model) {
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
    public static function serializePremiere(Premiere $model) {
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
    public static function serializePresent(Present $model) {
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
    public static function serializePreviouslyShown(PreviouslyShown $model) {
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
    public static function serializeProgramme(Programme $model) {
        return [
            "start"           => $model->getStart(),
            "stop"            => $model->getStop(),
            "pdcStart"        => $model->getPdcStart(),
            "vpsStart"        => $model->getVpsStart(),
            "showView"        => $model->getShowView(),
            "videoPlus"       => $model->getVideoPlus(),
            "channel"         => $model->getChannel(),
            "clumpIdx"        => $model->getClumpIdx(),
            "titles"          => JsonSerializer::serializeArray($model->getTitles()),
            "secondaryTitles" => JsonSerializer::serializeArray($model->getSecondaryTitles()),
            "descs"           => JsonSerializer::serializeArray($model->getDescs()),
            "credits"         => JsonSerializer::serializeModel($model->getCredits()),
            "date"            => JsonSerializer::serializeModel($model->getDate()),
            "categories"      => JsonSerializer::serializeArray($model->getCategories()),
            "keywords"        => JsonSerializer::serializeArray($model->getKeywords()),
            "language"        => JsonSerializer::serializeModel($model->getLanguage()),
            "origLanguage"    => JsonSerializer::serializeModel($model->getOrigLanguage()),
            "length"          => JsonSerializer::serializeModel($model->getLength()),
            "icons"           => JsonSerializer::serializeArray($model->getIcons()),
            "urls"            => JsonSerializer::serializeArray($model->getUrls()),
            "countries"       => JsonSerializer::serializeArray($model->getCountries()),
            "episodeNums"     => JsonSerializer::serializeArray($model->getEpisodeNums()),
            "video"           => JsonSerializer::serializeModel($model->getVideo()),
            "audio"           => JsonSerializer::serializeModel($model->getAudio()),
            "previouslyShown" => JsonSerializer::serializeModel($model->getPreviouslyShown()),
            "premiere"        => JsonSerializer::serializeModel($model->getPremiere()),
            "lastChance"      => JsonSerializer::serializeModel($model->getLastChance()),
            "new"             => $model->getNew(),
            "subtitles"       => JsonSerializer::serializeArray($model->getSubtitles()),
            "ratings"         => JsonSerializer::serializeArray($model->getRatings()),
            "starRatings"     => JsonSerializer::serializeArray($model->getStarRatings()),
            "reviews"         => JsonSerializer::serializeArray($model->getReviews()),
        ];
    }

    /**
     * Serialize a quality.
     *
     * @param Quality $model The quality.
     * @return array Returns the serialized quality.
     */
    public static function serializeQuality(Quality $model) {
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
    public static function serializeRating(Rating $model) {
        return [
            "icons"  => JsonSerializer::serializeArray($model->getIcons()),
            "system" => $model->getSystem(),
            "value"  => JsonSerializer::serializeModel($model->getValue()),
        ];
    }

    /**
     * Serialize a review.
     *
     * @param Review $model The review.
     * @return array Returns the serialized review.
     */
    public static function serializeReview(Review $model) {
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
    public static function serializeSecondaryTitle(SecondaryTitle $model) {
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
    public static function serializeStarRating(StarRating $model) {
        return [
            "value" => JsonSerializer::serializeModel($model->getValue()),
            "icons" => JsonSerializer::serializeArray($model->getIcons()),
        ];
    }

    /**
     * Serialize a stereo.
     *
     * @param Stereo $model The stereo.
     * @return array Returns the serialized stereo.
     */
    public static function serializeStereo(Stereo $model) {
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
    public static function serializeSubtitles(Subtitles $model) {
        return [
            "type"     => $model->getType(),
            "language" => JsonSerializer::serializeModel($model->getLanguage()),
        ];
    }

    /**
     * Serialize a title.
     *
     * @param Title $model The title.
     * @return array Returns the serialized title.
     */
    public static function serializeTitle(Title $model) {
        return [
            "lang"    => $model->getLang(),
            "content" => $model->getContent(),
        ];
    }

    /**
     * Serialize a tv.
     *
     * @param Tv $model The tv.
     * @return array Returns the serialized tv.
     */
    public static function serializeTv(Tv $model) {
        return [
            "date"              => $model->getDate(),
            "generatorInfoName" => $model->getGeneratorInfoName(),
            "generatorInfoUrl"  => $model->getGeneratorInfoUrl(),
            "sourceDataUrl"     => $model->getSourceDataUrl(),
            "sourceInfoName"    => $model->getSourceInfoName(),
            "sourceInfoUrl"     => $model->getSourceInfoUrl(),
            "channels"          => JsonSerializer::serializeArray($model->getChannels()),
            "programmes"        => JsonSerializer::serializeArray($model->getProgrammes()),
        ];
    }

    /**
     * Serialize an URL.
     *
     * @param Url $model The URL.
     * @return array Returns the serialized URL.
     */
    public static function serializeUrl(Url $model) {
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
    public static function serializeValue(Value $model) {
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
    public static function serializeVideo(Video $model) {
        return [
            "present" => JsonSerializer::serializeModel($model->getPresent()),
            "colour"  => JsonSerializer::serializeModel($model->getColour()),
            "aspect"  => JsonSerializer::serializeModel($model->getAspect()),
            "quality" => JsonSerializer::serializeModel($model->getQuality()),
        ];
    }
}
