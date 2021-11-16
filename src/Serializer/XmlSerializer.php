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

use WBW\Library\Serializer\Helper\XmlSerializerHelper;
use WBW\Library\Types\Helper\StringHelper;
use WBW\Library\XmlTv\Model\Actor;
use WBW\Library\XmlTv\Model\Adapter;
use WBW\Library\XmlTv\Model\Aspect;
use WBW\Library\XmlTv\Model\Audio;
use WBW\Library\XmlTv\Model\Category;
use WBW\Library\XmlTv\Model\Channel;
use WBW\Library\XmlTv\Model\Colour;
use WBW\Library\XmlTv\Model\Commentator;
use WBW\Library\XmlTv\Model\Composer;
use WBW\Library\XmlTv\Model\Country;
use WBW\Library\XmlTv\Model\Credits;
use WBW\Library\XmlTv\Model\Date;
use WBW\Library\XmlTv\Model\Desc;
use WBW\Library\XmlTv\Model\Director;
use WBW\Library\XmlTv\Model\DisplayName;
use WBW\Library\XmlTv\Model\Editor;
use WBW\Library\XmlTv\Model\EpisodeNum;
use WBW\Library\XmlTv\Model\Guest;
use WBW\Library\XmlTv\Model\Icon;
use WBW\Library\XmlTv\Model\Keyword;
use WBW\Library\XmlTv\Model\Language;
use WBW\Library\XmlTv\Model\LastChance;
use WBW\Library\XmlTv\Model\Length;
use WBW\Library\XmlTv\Model\OrigLanguage;
use WBW\Library\XmlTv\Model\Premiere;
use WBW\Library\XmlTv\Model\Present;
use WBW\Library\XmlTv\Model\Presenter;
use WBW\Library\XmlTv\Model\PreviouslyShown;
use WBW\Library\XmlTv\Model\Producer;
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
use WBW\Library\XmlTv\Model\Writer;

/**
 * XML serializer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Serializer
 */
class XmlSerializer extends XmlSerializerHelper {

    /**
     * Serializes an actor.
     *
     * @param Actor $model The actor.
     * @return string Returns the serialized actor.
     */
    public static function serializeActor(Actor $model): string {
        return SerializerHelper::domNode(Actor::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::ROLE => $model->getRole(),
        ]);
    }

    /**
     * Serializes an adapter.
     *
     * @param Adapter $model The adapter.
     * @return string Returns the serialized adapter.
     */
    public static function serializeAdapter(Adapter $model): string {
        return SerializerHelper::domNode(Adapter::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes an aspect.
     *
     * @param Aspect $model The aspect.
     * @return string Returns the serialized aspect.
     */
    public static function serializeAspect(Aspect $model): string {
        return SerializerHelper::domNode(Aspect::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes an audio.
     *
     * @param Audio $model The audio.
     * @return string Returns the serialized audio.
     */
    public static function serializeAudio(Audio $model): string {

        $content = static::xmlSerializeArray([
            $model->getPresent(),
            $model->getStereo(),
        ]);

        return StringHelper::domNode(Audio::DOM_NODE_NAME, $content);
    }

    /**
     * Serializes a category.
     *
     * @param Category $model The category.
     * @return string Returns the serialized category.
     */
    public static function serializeCategory(Category $model): string {
        return SerializerHelper::domNode(Category::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::LANG => $model->getLang(),
        ]);
    }

    /**
     * Serializes a channel.
     *
     * @param Channel $model The channel.
     * @return string Returns the serialized channel.
     */
    public static function serializeChannel(Channel $model): string {

        $content = [
            static::xmlSerializeArray($model->getDisplayNames()),
            static::xmlSerializeArray($model->getIcons()),
            static::xmlSerializeArray($model->getUrls()),
        ];

        return StringHelper::domNode(Channel::DOM_NODE_NAME, implode("", $content), [
            SerializerKeys::ID => $model->getId(),
        ]);
    }

    /**
     * Serializes a colour.
     *
     * @param Colour $model The colour.
     * @return string Returns the serialized colour.
     */
    public static function serializeColour(Colour $model): string {
        return SerializerHelper::domNode(Colour::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a commentator.
     *
     * @param Commentator $model The commentator.
     * @return string Returns the serialized commentator.
     */
    public static function serializeCommentator(Commentator $model): string {
        return SerializerHelper::domNode(Commentator::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a composer.
     *
     * @param Composer $model The composer.
     * @return string Returns the serialized composer.
     */
    public static function serializeComposer(Composer $model): string {
        return SerializerHelper::domNode(Composer::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a country.
     *
     * @param Country $model The country.
     * @return string Returns the serialized country.
     */
    public static function serializeCountry(Country $model): string {
        return SerializerHelper::domNode(Country::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::LANG => $model->getLang(),
        ]);
    }

    /**
     * Serializes a credits.
     *
     * @param Credits $model The credits.
     * @return string Returns the serialized credits.
     */
    public static function serializeCredits(Credits $model): string {

        $content = [
            static::xmlSerializeArray($model->getDirectors()),
            static::xmlSerializeArray($model->getActors()),
            static::xmlSerializeArray($model->getWriters()),
            static::xmlSerializeArray($model->getAdapters()),
            static::xmlSerializeArray($model->getProducers()),
            static::xmlSerializeArray($model->getComposers()),
            static::xmlSerializeArray($model->getEditors()),
            static::xmlSerializeArray($model->getPresenters()),
            static::xmlSerializeArray($model->getCommentators()),
            static::xmlSerializeArray($model->getGuests()),
        ];

        return StringHelper::domNode(Credits::DOM_NODE_NAME, implode("", $content));
    }

    /**
     * Serializes a date.
     *
     * @param Date $model The date.
     * @return string Returns the serialized date.
     */
    public static function serializeDate(Date $model): string {
        return SerializerHelper::domNode(Date::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a description.
     *
     * @param Desc $model The description.
     * @return string Returns the serialized description.
     */
    public static function serializeDesc(Desc $model): string {
        return SerializerHelper::domNode(Desc::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::LANG => $model->getLang(),
        ]);
    }

    /**
     * Serializes a director.
     *
     * @param Director $model The director.
     * @return string Returns the serialized director.
     */
    public static function serializeDirector(Director $model): string {
        return SerializerHelper::domNode(Director::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a display name.
     *
     * @param DisplayName $model The display name.
     * @return string Returns the serialized display name.
     */
    public static function serializeDisplayName(DisplayName $model): string {
        return SerializerHelper::domNode(DisplayName::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::LANG => $model->getLang(),
        ]);
    }

    /**
     * Serializes an editor.
     *
     * @param Editor $model The editor.
     * @return string Returns the serialized editor.
     */
    public static function serializeEditor(Editor $model): string {
        return SerializerHelper::domNode(Editor::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a episode number.
     *
     * @param EpisodeNum $model The episode number.
     * @return string Returns the serialized episode number.
     */
    public static function serializeEpisodeNum(EpisodeNum $model): string {
        return SerializerHelper::domNode(EpisodeNum::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::SYSTEM => $model->getSystem(),
        ]);
    }

    /**
     * Serializes a guest.
     *
     * @param Guest $model The guest.
     * @return string Returns the serialized guest.
     */
    public static function serializeGuest(Guest $model): string {
        return SerializerHelper::domNode(Guest::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes an icon.
     *
     * @param Icon $model The icon.
     * @return string Returns the serialized icon.
     */
    public static function serializeIcon(Icon $model): string {
        return StringHelper::domNode(Icon::DOM_NODE_NAME, null, [
            SerializerKeys::SRC    => $model->getSrc(),
            SerializerKeys::WIDTH  => $model->getWidth(),
            SerializerKeys::HEIGHT => $model->getHeight(),
        ], true);
    }

    /**
     * Serializes a keyword.
     *
     * @param Keyword $model The keyword.
     * @return string Returns the serialized keyword.
     */
    public static function serializeKeyword(Keyword $model): string {
        return StringHelper::domNode(Keyword::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::LANG => $model->getLang(),
        ]);
    }

    /**
     * Serializes a language.
     *
     * @param Language $model The language.
     * @return string Returns the serialized language.
     */
    public static function serializeLanguage(Language $model): string {
        return SerializerHelper::domNode(Language::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::LANG => $model->getLang(),
        ]);
    }

    /**
     * Serializes a last chance.
     *
     * @param LastChance $model The last chance.
     * @return string Returns the serialized last chance.
     */
    public static function serializeLastChance(LastChance $model): string {
        return SerializerHelper::domNode(LastChance::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::LANG => $model->getLang(),
        ]);
    }

    /**
     * Serializes a length.
     *
     * @param Length $model The length.
     * @return string Returns the serialized length.
     */
    public static function serializeLength(Length $model): string {
        return SerializerHelper::domNode(Length::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::UNITS => $model->getUnits(),
        ]);
    }

    /**
     * Serializes a original language.
     *
     * @param OrigLanguage $model The original language.
     * @return string Returns the serialized original language.
     */
    public static function serializeOrigLanguage(OrigLanguage $model): string {
        return SerializerHelper::domNode(OrigLanguage::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::LANG => $model->getLang(),
        ]);
    }

    /**
     * Serializes a premiere.
     *
     * @param Premiere $model The premiere.
     * @return string Returns the serialized premiere.
     */
    public static function serializePremiere(Premiere $model): string {
        return SerializerHelper::domNode(Premiere::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::LANG => $model->getLang(),
        ]);
    }

    /**
     * Serializes a present.
     *
     * @param Present $model The present.
     * @return string Returns the serialized present.
     */
    public static function serializePresent(Present $model): string {
        return SerializerHelper::domNode(Present::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a presenter.
     *
     * @param Presenter $model The presenter.
     * @return string Returns the serialized presenter.
     */
    public static function serializePresenter(Presenter $model): string {
        return SerializerHelper::domNode(Presenter::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a previously shown.
     *
     * @param PreviouslyShown $model The previously shown.
     * @return string Returns the serialized previously shown.
     */
    public static function serializePreviouslyShown(PreviouslyShown $model): string {
        return SerializerHelper::domNode(PreviouslyShown::DOM_NODE_NAME, null, [
            SerializerKeys::CHANNEL => $model->getChannel(),
            SerializerKeys::START   => $model->getStart(),
        ], true);
    }

    /**
     * Serializes a producer.
     *
     * @param Producer $model The producer.
     * @return string Returns the serialized producer.
     */
    public static function serializeProducer(Producer $model): string {
        return SerializerHelper::domNode(Producer::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a programme.
     *
     * @param Programme $model The programme.
     * @return string Returns the serialized programme.
     */
    public static function serializeProgramme(Programme $model): string {

        $content = [
            static::xmlSerializeArray($model->getTitles()),
            static::xmlSerializeArray($model->getSecondaryTitles()),
            static::xmlSerializeArray($model->getDescs()),
            static::xmlSerializeModel($model->getCredits()),
            static::xmlSerializeModel($model->getDate()),
            static::xmlSerializeArray($model->getCategories()),
            static::xmlSerializeArray($model->getKeywords()),
            static::xmlSerializeModel($model->getLanguage()),
            static::xmlSerializeModel($model->getOrigLanguage()),
            static::xmlSerializeModel($model->getLength()),
            static::xmlSerializeArray($model->getIcons()),
            static::xmlSerializeArray($model->getUrls()),
            static::xmlSerializeArray($model->getCountries()),
            static::xmlSerializeArray($model->getEpisodeNums()),
            static::xmlSerializeModel($model->getVideo()),
            static::xmlSerializeModel($model->getAudio()),
            static::xmlSerializeModel($model->getPreviouslyShown()),
            static::xmlSerializeModel($model->getPremiere()),
            static::xmlSerializeModel($model->getLastChance()),
            true === $model->getNew() ? "<new/>" : "",
            static::xmlSerializeArray($model->getSubtitles()),
            static::xmlSerializeArray($model->getRatings()),
            static::xmlSerializeArray($model->getStarRatings()),
            static::xmlSerializeArray($model->getReviews()),
        ];

        return StringHelper::domNode(Programme::DOM_NODE_NAME, implode("", $content), [
            SerializerKeys::START   => $model->getStart(),
            SerializerKeys::STOP    => $model->getStop(),
            "pdc-start"             => $model->getPdcStart(),
            "vps-start"             => $model->getVpsStart(),
            "showview"              => $model->getShowView(),
            "videoplus"             => $model->getVideoPlus(),
            SerializerKeys::CHANNEL => $model->getChannel(),
            "clumpidx"              => $model->getClumpIdx(),
        ]);
    }

    /**
     * Serializes a quality.
     *
     * @param Quality $model The quality.
     * @return string Returns the serialized quality.
     */
    public static function serializeQuality(Quality $model): string {
        return SerializerHelper::domNode(Quality::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a rating.
     *
     * @param Rating $model The rating.
     * @return string Returns the serialized rating.
     */
    public static function serializeRating(Rating $model): string {

        $content = [
            static::xmlSerializeModel($model->getValue()),
            static::xmlSerializeArray($model->getIcons()),
        ];

        return StringHelper::domNode(Rating::DOM_NODE_NAME, implode("", $content), [
            SerializerKeys::SYSTEM => $model->getSystem(),
        ]);
    }

    /**
     * Serializes a review.
     *
     * @param Review $model The review.
     * @return string Returns the serialized review.
     */
    public static function serializeReview(Review $model): string {
        return SerializerHelper::domNode(Review::DOM_NODE_NAME, null, [
            SerializerKeys::TYPE     => $model->getType(),
            SerializerKeys::SOURCE   => $model->getSource(),
            SerializerKeys::REVIEWER => $model->getReviewer(),
            SerializerKeys::LANG     => $model->getLang(),
        ], true);
    }

    /**
     * Serializes a secondary title.
     *
     * @param SecondaryTitle $model The secondary title.
     * @return string Returns the serialized secondary title.
     */
    public static function serializeSecondaryTitle(SecondaryTitle $model): string {
        return SerializerHelper::domNode(SecondaryTitle::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::LANG => $model->getLang(),
        ]);
    }

    /**
     * Serializes a star rating.
     *
     * @param StarRating $model The star rating.
     * @return string Returns the serialized star rating.
     */
    public static function serializeStarRating(StarRating $model): string {

        $content = [
            static::xmlSerializeModel($model->getValue()),
            static::xmlSerializeArray($model->getIcons()),
        ];

        return StringHelper::domNode(StarRating::DOM_NODE_NAME, implode("", $content));
    }

    /**
     * Serializes a stereo.
     *
     * @param Stereo $model The stereo.
     * @return string Returns the serialized stereo.
     */
    public static function serializeStereo(Stereo $model): string {
        return SerializerHelper::domNode(Stereo::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a subtitles.
     *
     * @param Subtitles $model The subtitles.
     * @return string Returns the serialized subtitles.
     */
    public static function serializeSubtitles(Subtitles $model): string {

        $content = static::xmlSerializeModel($model->getLanguage());

        return StringHelper::domNode(Subtitles::DOM_NODE_NAME, $content, [
            SerializerKeys::TYPE => $model->getType(),
        ]);
    }

    /**
     * Serializes a title.
     *
     * @param Title $model The title.
     * @return string Returns the serialized title.
     */
    public static function serializeTitle(Title $model): string {
        return SerializerHelper::domNode(Title::DOM_NODE_NAME, $model->getContent(), [
            SerializerKeys::LANG => $model->getLang(),
        ]);
    }

    /**
     * Serializes a TV.
     *
     * @param Tv $model The TV.
     * @return string Returns the serialized TV.
     */
    public static function serializeTv(Tv $model): string {

        $content = [
            static::xmlSerializeArray($model->getChannels()),
            static::xmlSerializeArray($model->getProgrammes()),
        ];

        return StringHelper::domNode(Tv::DOM_NODE_NAME, implode("", $content), [
            SerializerKeys::DATE  => $model->getDate(),
            "generator-info-name" => $model->getGeneratorInfoName(),
            "generator-info-url"  => $model->getGeneratorInfoUrl(),
            "source-data-url"     => $model->getSourceDataUrl(),
            "source-info-name"    => $model->getSourceInfoName(),
            "source-info-url"     => $model->getSourceInfoUrl(),
        ]);
    }

    /**
     * Serializes an URL.
     *
     * @param Url $model The URL.
     * @return string Returns the serialized URL.
     */
    public static function serializeUrl(Url $model): string {
        return SerializerHelper::domNode(Url::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a value.
     *
     * @param Value $model The value.
     * @return string Returns the serialized value.
     */
    public static function serializeValue(Value $model): string {
        return SerializerHelper::domNode(Value::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serializes a video.
     *
     * @param Video $model The video.
     * @return string Returns the serialized video.
     */
    public static function serializeVideo(Video $model): string {

        $content = static::xmlSerializeArray([
            $model->getPresent(),
            $model->getColour(),
            $model->getAspect(),
            $model->getQuality(),
        ]);

        return StringHelper::domNode(Video::DOM_NODE_NAME, $content);
    }

    /**
     * Serializes a writer.
     *
     * @param Writer $model The writer.
     * @return string Returns the serialized writer.
     */
    public static function serializeWriter(Writer $model): string {
        return SerializerHelper::domNode(Writer::DOM_NODE_NAME, $model->getContent());
    }
}
