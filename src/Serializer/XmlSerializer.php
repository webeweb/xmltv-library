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
     * @return String Returns the serialized actor.
     */
    public static function serializeActor(Actor $model) {
        return StringHelper::domNode("actor", $model->getContent(), [
            "role" => $model->getRole(),
        ]);
    }

    /**
     * Serialize an adapter.
     *
     * @param Adapter $model The adapter.
     * @return String Returns the serialized adapter.
     */
    public static function serializeAdapter(Adapter $model) {
        return StringHelper::domNode("adapter", $model->getContent());
    }

    /**
     * Serialize an array.
     *
     * @param AbstractModel[] $models The models.
     * @return String Returns the serialized array.
     */
    protected static function serializeArray(array $models) {

        $output = [];

        foreach ($models as $current) {
            $output[] = static::serializeModel($current);
        }

        return implode("", $output);
    }

    /**
     * Serialize an aspect.
     *
     * @param Aspect $model The aspect.
     * @return String Returns the serialized aspect.
     */
    public static function serializeAspect(Aspect $model) {
        return StringHelper::domNode("aspect", $model->getContent());
    }

    /**
     * Serialize an audio.
     *
     * @param Audio $model The audio.
     * @return string Returns the serialized audio.
     */
    public static function serializeAudio(Audio $model) {

        $content = XmlSerializer::serializeArray([
            $model->getPresent(),
            $model->getStereo(),
        ]);

        return StringHelper::domNode("audio", $content);
    }

    /**
     * Serialize a category.
     *
     * @param Category $model The category.
     * @return String Returns the serialized category.
     */
    public static function serializeCategory(Category $model) {
        return StringHelper::domNode("category", $model->getContent(), [
            "lang" => $model->getLang(),
        ]);
    }

    /**
     * Serialize a channel.
     *
     * @param Channel $model The channel.
     * @return string Returns the serialized channel.
     */
    public static function serializeChannel(Channel $model) {

        $content = [
            XmlSerializer::serializeArray($model->getDisplayNames()),
            XmlSerializer::serializeArray($model->getIcons()),
            XmlSerializer::serializeArray($model->getUrls()),
        ];

        return StringHelper::domNode("channel", implode("", $content), [
            "id" => $model->getId(),
        ]);
    }

    /**
     * Serialize a colour.
     *
     * @param Colour $model The colour.
     * @return String Returns the serialized colour.
     */
    public static function serializeColour(Colour $model) {
        return StringHelper::domNode("colour", $model->getContent());
    }

    /**
     * Serialize a commentator.
     *
     * @param Commentator $model The commentator.
     * @return String Returns the serialized commentator.
     */
    public static function serializeCommentator(Commentator $model) {
        return StringHelper::domNode("commentator", $model->getContent());
    }

    /**
     * Serialize a composer.
     *
     * @param Composer $model The composer.
     * @return String Returns the serialized composer.
     */
    public static function serializeComposer(Composer $model) {
        return StringHelper::domNode("composer", $model->getContent());
    }

    /**
     * Serialize a country.
     *
     * @param Country $model The country.
     * @return String Returns the serialized country.
     */
    public static function serializeCountry(Country $model) {
        return StringHelper::domNode("country", $model->getContent(), [
            "lang" => $model->getLang(),
        ]);
    }

    /**
     * Serialize a credits.
     *
     * @param Credits $model The credits.
     * @return string Returns the serialized credits.
     */
    public static function serializeCredits(Credits $model) {

        $content = [
            XmlSerializer::serializeArray($model->getDirectors()),
            XmlSerializer::serializeArray($model->getActors()),
            XmlSerializer::serializeArray($model->getWriters()),
            XmlSerializer::serializeArray($model->getAdapters()),
            XmlSerializer::serializeArray($model->getProducers()),
            XmlSerializer::serializeArray($model->getComposers()),
            XmlSerializer::serializeArray($model->getEditors()),
            XmlSerializer::serializeArray($model->getPresenters()),
            XmlSerializer::serializeArray($model->getCommentators()),
            XmlSerializer::serializeArray($model->getGuests()),
        ];

        return StringHelper::domNode("credits", implode("", $content));
    }

    /**
     * Serialize a date.
     *
     * @param Date $model The date.
     * @return String Returns the serialized date.
     */
    public static function serializeDate(Date $model) {
        return StringHelper::domNode("date", $model->getContent());
    }

    /**
     * Serialize a description.
     *
     * @param Desc $model The description.
     * @return String Returns the serialized description.
     */
    public static function serializeDesc(Desc $model) {
        return StringHelper::domNode("desc", $model->getContent(), [
            "lang" => $model->getLang(),
        ]);
    }

    /**
     * Serialize a director.
     *
     * @param Director $model The director.
     * @return String Returns the serialized director.
     */
    public static function serializeDirector(Director $model) {
        return StringHelper::domNode("director", $model->getContent());
    }

    /**
     * Serialize a display name.
     *
     * @param DisplayName $model The display name.
     * @return String Returns the serialized display name.
     */
    public static function serializeDisplayName(DisplayName $model) {
        return StringHelper::domNode("display-name", $model->getContent(), [
            "lang" => $model->getLang(),
        ]);
    }

    /**
     * Serialize an editor.
     *
     * @param Editor $model The editor.
     * @return String Returns the serialized editor.
     */
    public static function serializeEditor(Editor $model) {
        return StringHelper::domNode("editor", $model->getContent());
    }

    /**
     * Serialize a episode number.
     *
     * @param EpisodeNum $model The episode number.
     * @return String Returns the serialized episode number.
     */
    public static function serializeEpisodeNum(EpisodeNum $model) {
        return StringHelper::domNode("episode-num", $model->getContent(), [
            "system" => $model->getSystem(),
        ]);
    }

    /**
     * Serialize a guest.
     *
     * @param Guest $model The guest.
     * @return String Returns the serialized guest.
     */
    public static function serializeGuest(Guest $model) {
        return StringHelper::domNode("guest", $model->getContent());
    }

    /**
     * Serialize an icon.
     *
     * @param Icon $model The icon.
     * @return String Returns the serialized icon.
     */
    public static function serializeIcon(Icon $model) {
        return StringHelper::domNode("icon", null, [
            "src"    => $model->getSrc(),
            "width"  => $model->getWidth(),
            "height" => $model->getHeight(),
        ], true);
    }

    /**
     * Serialize a keyword.
     *
     * @param Keyword $model The keyword.
     * @return String Returns the serialized keyword.
     */
    public static function serializeKeyword(Keyword $model) {
        return StringHelper::domNode("keyword", $model->getContent(), [
            "lang" => $model->getLang(),
        ]);
    }

    /**
     * Serialize a language.
     *
     * @param Language $model The language.
     * @return String Returns the serialized language.
     */
    public static function serializeLanguage(Language $model) {
        return StringHelper::domNode("language", $model->getContent(), [
            "lang" => $model->getLang(),
        ]);
    }

    /**
     * Serialize a last chance.
     *
     * @param LastChance $model The last chance.
     * @return String Returns the serialized last chance.
     */
    public static function serializeLastChance(LastChance $model) {
        return StringHelper::domNode("last-chance", $model->getContent(), [
            "lang" => $model->getLang(),
        ]);
    }

    /**
     * Serialize a length.
     *
     * @param Length $model The length.
     * @return String Returns the serialized length.
     */
    public static function serializeLength(Length $model) {
        return StringHelper::domNode("length", $model->getContent(), [
            "units" => $model->getUnits(),
        ]);
    }

    /**
     * Serialize a model.
     *
     * @param AbstractModel|null $model The model.
     * @return string Returns the serialized model.
     */
    protected static function serializeModel(AbstractModel $model = null) {

        if (null === $model) {
            return "";
        }

        return $model->xmlSerialize();
    }

    /**
     * Serialize a original language.
     *
     * @param OrigLanguage $model The original language.
     * @return String Returns the serialized original language.
     */
    public static function serializeOrigLanguage(OrigLanguage $model) {
        return StringHelper::domNode("orig-language", $model->getContent(), [
            "lang" => $model->getLang(),
        ]);
    }

    /**
     * Serialize a premiere.
     *
     * @param Premiere $model The premiere.
     * @return String Returns the serialized premiere.
     */
    public static function serializePremiere(Premiere $model) {
        return StringHelper::domNode("premiere", $model->getContent(), [
            "lang" => $model->getLang(),
        ]);
    }

    /**
     * Serialize a present.
     *
     * @param Present $model The present.
     * @return String Returns the serialized present.
     */
    public static function serializePresent(Present $model) {
        return StringHelper::domNode("present", $model->getContent());
    }

    /**
     * Serialize a presenter.
     *
     * @param Presenter $model The presenter.
     * @return String Returns the serialized presenter.
     */
    public static function serializePresenter(Presenter $model) {
        return StringHelper::domNode("presenter", $model->getContent());
    }

    /**
     * Serialize a previously shown.
     *
     * @param PreviouslyShown $model The previously shown.
     * @return String Returns the serialized previously shown.
     */
    public static function serializePreviouslyShown(PreviouslyShown $model) {
        return StringHelper::domNode("previously-shown", null, [
            "channel" => $model->getChannel(),
            "start"   => $model->getStart(),
        ], true);
    }

    /**
     * Serialize a producer.
     *
     * @param Producer $model The producer.
     * @return String Returns the serialized producer.
     */
    public static function serializeProducer(Producer $model) {
        return StringHelper::domNode("producer", $model->getContent());
    }

    /**
     * Serialize a programme.
     *
     * @param Programme $model The programme.
     * @return string Returns the serialized programme.
     */
    public static function serializeProgramme(Programme $model) {

        $content = [
            XmlSerializer::serializeArray($model->getTitles()),
            XmlSerializer::serializeArray($model->getSecondaryTitles()),
            XmlSerializer::serializeArray($model->getDescs()),
            XmlSerializer::serializeModel($model->getCredits()),
            XmlSerializer::serializeModel($model->getDate()),
            XmlSerializer::serializeArray($model->getCategories()),
            XmlSerializer::serializeArray($model->getKeywords()),
            XmlSerializer::serializeModel($model->getLanguage()),
            XmlSerializer::serializeModel($model->getOrigLanguage()),
            XmlSerializer::serializeModel($model->getLength()),
            XmlSerializer::serializeArray($model->getIcons()),
            XmlSerializer::serializeArray($model->getUrls()),
            XmlSerializer::serializeArray($model->getCountries()),
            XmlSerializer::serializeArray($model->getEpisodeNums()),
            XmlSerializer::serializeModel($model->getVideo()),
            XmlSerializer::serializeModel($model->getAudio()),
            XmlSerializer::serializeModel($model->getPreviouslyShown()),
            XmlSerializer::serializeModel($model->getPremiere()),
            XmlSerializer::serializeModel($model->getLastChance()),
            true === $model->getNew() ? "<new/>" : "",
            XmlSerializer::serializeArray($model->getSubtitles()),
            XmlSerializer::serializeArray($model->getRatings()),
            XmlSerializer::serializeArray($model->getStarRatings()),
            XmlSerializer::serializeArray($model->getReviews()),
        ];

        return StringHelper::domNode("programme", implode("", $content), [
            "start"     => $model->getStart(),
            "stop"      => $model->getStop(),
            "pdc-start" => $model->getPdcStart(),
            "vps-start" => $model->getVpsStart(),
            "showview"  => $model->getShowView(),
            "videoplus" => $model->getVideoPlus(),
            "channel"   => $model->getChannel(),
            "clumpidx"  => $model->getClumpIdx(),
        ]);
    }

    /**
     * Serialize a quality.
     *
     * @param Quality $model The quality.
     * @return String Returns the serialized quality.
     */
    public static function serializeQuality(Quality $model) {
        return StringHelper::domNode("quality", $model->getContent());
    }

    /**
     * Serialize a rating.
     *
     * @param Rating $model The rating.
     * @return string Returns the serialized rating.
     */
    public static function serializeRating(Rating $model) {

        $content = [
            XmlSerializer::serializeModel($model->getValue()),
            XmlSerializer::serializeArray($model->getIcons()),
        ];

        return StringHelper::domNode("rating", implode("", $content), [
            "system" => $model->getSystem(),
        ]);
    }

    /**
     * Serialize a review.
     *
     * @param Review $model The review.
     * @return String Returns the serialized review.
     */
    public static function serializeReview(Review $model) {
        return StringHelper::domNode("review", null, [
            "type"     => $model->getType(),
            "source"   => $model->getSource(),
            "reviewer" => $model->getReviewer(),
            "lang"     => $model->getLang(),
        ], true);
    }

    /**
     * Serialize a secondary title.
     *
     * @param SecondaryTitle $model The secondary title.
     * @return String Returns the serialized secondary title.
     */
    public static function serializeSecondaryTitle(SecondaryTitle $model) {
        return StringHelper::domNode("sub-title", $model->getContent(), [
            "lang" => $model->getLang(),
        ]);
    }

    /**
     * Serialize a star rating.
     *
     * @param StarRating $model The star rating.
     * @return string Returns the serialized star rating.
     */
    public static function serializeStarRating(StarRating $model) {

        $content = [
            XmlSerializer::serializeModel($model->getValue()),
            XmlSerializer::serializeArray($model->getIcons()),
        ];

        return StringHelper::domNode("star-rating", implode("", $content));
    }

    /**
     * Serialize a stereo.
     *
     * @param Stereo $model The stereo.
     * @return String Returns the serialized stereo.
     */
    public static function serializeStereo(Stereo $model) {
        return StringHelper::domNode("stereo", $model->getContent());
    }

    /**
     * Serialize a subtitles.
     *
     * @param Subtitles $model The subtitles.
     * @return string Returns the serialized subtitles.
     */
    public static function serializeSubtitles(Subtitles $model) {

        $content = XmlSerializer::serializeModel($model->getLanguage());

        return StringHelper::domNode("subtitles", $content, [
            "type" => $model->getType(),
        ]);
    }

    /**
     * Serialize a title.
     *
     * @param Title $model The title.
     * @return String Returns the serialized title.
     */
    public static function serializeTitle(Title $model) {
        return StringHelper::domNode("title", $model->getContent(), [
            "lang" => $model->getLang(),
        ]);
    }

    /**
     * Serialize a tv.
     *
     * @param Tv $model The tv.
     * @return string Returns the serialized tv.
     */
    public static function serializeTv(Tv $model) {

        $content = [
            XmlSerializer::serializeArray($model->getChannels()),
            XmlSerializer::serializeArray($model->getProgrammes()),
        ];

        return StringHelper::domNode("tv", implode("", $content), [
            "date"                => $model->getDate(),
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
     * @return String Returns the serialized URL.
     */
    public static function serializeUrl(Url $model) {
        return StringHelper::domNode("url", $model->getContent());
    }

    /**
     * Serialize a value.
     *
     * @param Value $model The value.
     * @return String Returns the serialized value.
     */
    public static function serializeValue(Value $model) {
        return StringHelper::domNode("value", $model->getContent());
    }

    /**
     * Serialize a video.
     *
     * @param Video $model The video.
     * @return string Returns the serialized video.
     */
    public static function serializeVideo(Video $model) {

        $content = XmlSerializer::serializeArray([
            $model->getPresent(),
            $model->getColour(),
            $model->getAspect(),
            $model->getQuality(),
        ]);

        return StringHelper::domNode("video", $content);
    }

    /**
     * Serialize a writer.
     *
     * @param Writer $model The writer.
     * @return String Returns the serialized writer.
     */
    public static function serializeWriter(Writer $model) {
        return StringHelper::domNode("writer", $model->getContent());
    }
}
