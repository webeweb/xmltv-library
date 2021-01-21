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

use WBW\Library\Core\Argument\Helper\StringHelper;
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
 * XML serializer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Serializer
 */
class XmlSerializer {

    /**
     * Serialize an actor.
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
     * Serialize an adapter.
     *
     * @param Adapter $model The adapter.
     * @return string Returns the serialized adapter.
     */
    public static function serializeAdapter(Adapter $model): string {
        return SerializerHelper::domNode(Adapter::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize an aspect.
     *
     * @param Aspect $model The aspect.
     * @return string Returns the serialized aspect.
     */
    public static function serializeAspect(Aspect $model): string {
        return SerializerHelper::domNode(Aspect::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize an audio.
     *
     * @param Audio $model The audio.
     * @return string Returns the serialized audio.
     */
    public static function serializeAudio(Audio $model): string {

        $content = SerializerHelper::xmlSerializeArray([
            $model->getPresent(),
            $model->getStereo(),
        ]);

        return StringHelper::domNode(Audio::DOM_NODE_NAME, $content);
    }

    /**
     * Serialize a category.
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
     * Serialize a channel.
     *
     * @param Channel $model The channel.
     * @return string Returns the serialized channel.
     */
    public static function serializeChannel(Channel $model): string {

        $content = [
            SerializerHelper::xmlSerializeArray($model->getDisplayNames()),
            SerializerHelper::xmlSerializeArray($model->getIcons()),
            SerializerHelper::xmlSerializeArray($model->getUrls()),
        ];

        return StringHelper::domNode(Channel::DOM_NODE_NAME, implode("", $content), [
            SerializerKeys::ID => $model->getId(),
        ]);
    }

    /**
     * Serialize a colour.
     *
     * @param Colour $model The colour.
     * @return string Returns the serialized colour.
     */
    public static function serializeColour(Colour $model): string {
        return SerializerHelper::domNode(Colour::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a commentator.
     *
     * @param Commentator $model The commentator.
     * @return string Returns the serialized commentator.
     */
    public static function serializeCommentator(Commentator $model): string {
        return SerializerHelper::domNode(Commentator::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a composer.
     *
     * @param Composer $model The composer.
     * @return string Returns the serialized composer.
     */
    public static function serializeComposer(Composer $model): string {
        return SerializerHelper::domNode(Composer::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a country.
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
     * Serialize a credits.
     *
     * @param Credits $model The credits.
     * @return string Returns the serialized credits.
     */
    public static function serializeCredits(Credits $model): string {

        $content = [
            SerializerHelper::xmlSerializeArray($model->getDirectors()),
            SerializerHelper::xmlSerializeArray($model->getActors()),
            SerializerHelper::xmlSerializeArray($model->getWriters()),
            SerializerHelper::xmlSerializeArray($model->getAdapters()),
            SerializerHelper::xmlSerializeArray($model->getProducers()),
            SerializerHelper::xmlSerializeArray($model->getComposers()),
            SerializerHelper::xmlSerializeArray($model->getEditors()),
            SerializerHelper::xmlSerializeArray($model->getPresenters()),
            SerializerHelper::xmlSerializeArray($model->getCommentators()),
            SerializerHelper::xmlSerializeArray($model->getGuests()),
        ];

        return StringHelper::domNode(Credits::DOM_NODE_NAME, implode("", $content));
    }

    /**
     * Serialize a date.
     *
     * @param Date $model The date.
     * @return string Returns the serialized date.
     */
    public static function serializeDate(Date $model): string {
        return SerializerHelper::domNode(Date::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a description.
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
     * Serialize a director.
     *
     * @param Director $model The director.
     * @return string Returns the serialized director.
     */
    public static function serializeDirector(Director $model): string {
        return SerializerHelper::domNode(Director::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a display name.
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
     * Serialize an editor.
     *
     * @param Editor $model The editor.
     * @return string Returns the serialized editor.
     */
    public static function serializeEditor(Editor $model): string {
        return SerializerHelper::domNode(Editor::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a episode number.
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
     * Serialize a guest.
     *
     * @param Guest $model The guest.
     * @return string Returns the serialized guest.
     */
    public static function serializeGuest(Guest $model): string {
        return SerializerHelper::domNode(Guest::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize an icon.
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
     * Serialize a keyword.
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
     * Serialize a language.
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
     * Serialize a last chance.
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
     * Serialize a length.
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
     * Serialize a original language.
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
     * Serialize a premiere.
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
     * Serialize a present.
     *
     * @param Present $model The present.
     * @return string Returns the serialized present.
     */
    public static function serializePresent(Present $model): string {
        return SerializerHelper::domNode(Present::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a presenter.
     *
     * @param Presenter $model The presenter.
     * @return string Returns the serialized presenter.
     */
    public static function serializePresenter(Presenter $model): string {
        return SerializerHelper::domNode(Presenter::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a previously shown.
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
     * Serialize a producer.
     *
     * @param Producer $model The producer.
     * @return string Returns the serialized producer.
     */
    public static function serializeProducer(Producer $model): string {
        return SerializerHelper::domNode(Producer::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a programme.
     *
     * @param Programme $model The programme.
     * @return string Returns the serialized programme.
     */
    public static function serializeProgramme(Programme $model): string {

        $content = [
            SerializerHelper::xmlSerializeArray($model->getTitles()),
            SerializerHelper::xmlSerializeArray($model->getSecondaryTitles()),
            SerializerHelper::xmlSerializeArray($model->getDescs()),
            SerializerHelper::xmlSerializeModel($model->getCredits()),
            SerializerHelper::xmlSerializeModel($model->getDate()),
            SerializerHelper::xmlSerializeArray($model->getCategories()),
            SerializerHelper::xmlSerializeArray($model->getKeywords()),
            SerializerHelper::xmlSerializeModel($model->getLanguage()),
            SerializerHelper::xmlSerializeModel($model->getOrigLanguage()),
            SerializerHelper::xmlSerializeModel($model->getLength()),
            SerializerHelper::xmlSerializeArray($model->getIcons()),
            SerializerHelper::xmlSerializeArray($model->getUrls()),
            SerializerHelper::xmlSerializeArray($model->getCountries()),
            SerializerHelper::xmlSerializeArray($model->getEpisodeNums()),
            SerializerHelper::xmlSerializeModel($model->getVideo()),
            SerializerHelper::xmlSerializeModel($model->getAudio()),
            SerializerHelper::xmlSerializeModel($model->getPreviouslyShown()),
            SerializerHelper::xmlSerializeModel($model->getPremiere()),
            SerializerHelper::xmlSerializeModel($model->getLastChance()),
            true === $model->getNew() ? "<new/>" : "",
            SerializerHelper::xmlSerializeArray($model->getSubtitles()),
            SerializerHelper::xmlSerializeArray($model->getRatings()),
            SerializerHelper::xmlSerializeArray($model->getStarRatings()),
            SerializerHelper::xmlSerializeArray($model->getReviews()),
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
     * Serialize a quality.
     *
     * @param Quality $model The quality.
     * @return string Returns the serialized quality.
     */
    public static function serializeQuality(Quality $model): string {
        return SerializerHelper::domNode(Quality::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a rating.
     *
     * @param Rating $model The rating.
     * @return string Returns the serialized rating.
     */
    public static function serializeRating(Rating $model): string {

        $content = [
            SerializerHelper::xmlSerializeModel($model->getValue()),
            SerializerHelper::xmlSerializeArray($model->getIcons()),
        ];

        return StringHelper::domNode(Rating::DOM_NODE_NAME, implode("", $content), [
            SerializerKeys::SYSTEM => $model->getSystem(),
        ]);
    }

    /**
     * Serialize a review.
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
     * Serialize a secondary title.
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
     * Serialize a star rating.
     *
     * @param StarRating $model The star rating.
     * @return string Returns the serialized star rating.
     */
    public static function serializeStarRating(StarRating $model): string {

        $content = [
            SerializerHelper::xmlSerializeModel($model->getValue()),
            SerializerHelper::xmlSerializeArray($model->getIcons()),
        ];

        return StringHelper::domNode(StarRating::DOM_NODE_NAME, implode("", $content));
    }

    /**
     * Serialize a stereo.
     *
     * @param Stereo $model The stereo.
     * @return string Returns the serialized stereo.
     */
    public static function serializeStereo(Stereo $model): string {
        return SerializerHelper::domNode(Stereo::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a subtitles.
     *
     * @param Subtitles $model The subtitles.
     * @return string Returns the serialized subtitles.
     */
    public static function serializeSubtitles(Subtitles $model): string {

        $content = SerializerHelper::xmlSerializeModel($model->getLanguage());

        return StringHelper::domNode(Subtitles::DOM_NODE_NAME, $content, [
            SerializerKeys::TYPE => $model->getType(),
        ]);
    }

    /**
     * Serialize a title.
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
     * Serialize a TV.
     *
     * @param Tv $model The TV.
     * @return string Returns the serialized TV.
     */
    public static function serializeTv(Tv $model): string {

        $content = [
            SerializerHelper::xmlSerializeArray($model->getChannels()),
            SerializerHelper::xmlSerializeArray($model->getProgrammes()),
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
     * Serialize an URL.
     *
     * @param Url $model The URL.
     * @return string Returns the serialized URL.
     */
    public static function serializeUrl(Url $model): string {
        return SerializerHelper::domNode(Url::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a value.
     *
     * @param Value $model The value.
     * @return string Returns the serialized value.
     */
    public static function serializeValue(Value $model): string {
        return SerializerHelper::domNode(Value::DOM_NODE_NAME, $model->getContent());
    }

    /**
     * Serialize a video.
     *
     * @param Video $model The video.
     * @return string Returns the serialized video.
     */
    public static function serializeVideo(Video $model): string {

        $content = SerializerHelper::xmlSerializeArray([
            $model->getPresent(),
            $model->getColour(),
            $model->getAspect(),
            $model->getQuality(),
        ]);

        return StringHelper::domNode(Video::DOM_NODE_NAME, $content);
    }

    /**
     * Serialize a writer.
     *
     * @param Writer $model The writer.
     * @return string Returns the serialized writer.
     */
    public static function serializeWriter(Writer $model): string {
        return SerializerHelper::domNode(Writer::DOM_NODE_NAME, $model->getContent());
    }
}
