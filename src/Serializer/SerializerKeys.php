<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Serializer;

/**
 * Serializer keys interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Serializer
 */
interface SerializerKeys {

    /**
     * Serializer key "actors".
     *
     * @var string
     */
    const ACTORS = "actors";

    /**
     * Serializer key "adapters".
     *
     * @var string
     */
    const ADAPTERS = "adapters";

    /**
     * Serializer key "aspect".
     *
     * @var string
     */
    const ASPECT = "aspect";

    /**
     * Serializer key "audio".
     *
     * @var string
     */
    const AUDIO = "audio";

    /**
     * Serializer key "categories".
     *
     * @var string
     */
    const CATEGORIES = "categories";

    /**
     * Serializer key "channel".
     *
     * @var string
     */
    const CHANNEL = "channel";

    /**
     * Serializer key "channels".
     *
     * @var string
     */
    const CHANNELS = "channels";

    /**
     * Serializer key "clump idx".
     *
     * @var string
     */
    const CLUMP_IDX = "clumpIdx";

    /**
     * Serializer key "colour".
     *
     * @var string
     */
    const COLOUR = "colour";

    /**
     * Serializer key "commentators".
     *
     * @var string
     */
    const COMMENTATORS = "commentators";

    /**
     * Serializer key "composers".
     *
     * @var string
     */
    const COMPOSERS = "composers";

    /**
     * Serializer key "content".
     *
     * @var string
     */
    const CONTENT = "content";

    /**
     * Serializer key "countries".
     *
     * @var string
     */
    const COUNTRIES = "countries";

    /**
     * Serializer key "credits".
     *
     * @var string
     */
    const CREDITS = "credits";

    /**
     * Serializer key "date".
     *
     * @var string
     */
    const DATE = "date";

    /**
     * Serializer key "descriptions".
     *
     * @var string
     */
    const DESCS = "descs";

    /**
     * Serializer key "directors".
     *
     * @var string
     */
    const DIRECTORS = "directors";

    /**
     * Serializer key "display names".
     *
     * @var string
     */
    const DISPLAY_NAMES = "displayNames";

    /**
     * Serializer key "editors".
     *
     * @var string
     */
    const EDITORS = "editors";

    /**
     * Serializer key "episode numbers".
     *
     * @var string
     */
    const EPISODE_NUMS = "episodeNums";

    /**
     * Serializer key "generator info name".
     *
     * @var string
     */
    const GENERATOR_INFO_NAME = "generatorInfoName";

    /**
     * Serializer key "generator info URL".
     *
     * @var string
     */
    const GENERATOR_INFO_URL = "generatorInfoUrl";

    /**
     * Serializer key "guests".
     *
     * @var string
     */
    const GUESTS = "guests";

    /**
     * Serializer key "height".
     *
     * @var string
     */
    const HEIGHT = "height";

    /**
     * Serializer key "icons".
     *
     * @var string
     */
    const ICONS = "icons";

    /**
     * Serializer key "id".
     *
     * @var string
     */
    const ID = "id";

    /**
     * Serializer key "keywords".
     *
     * @var string
     */
    const KEYWORDS = "keywords";

    /**
     * Serializer key "lang".
     *
     * @var string
     */
    const LANG = "lang";

    /**
     * Serializer key "language".
     *
     * @var string
     */
    const LANGUAGE = "language";

    /**
     * Serializer key "last chance".
     *
     * @var string
     */
    const LAST_CHANCE = "lastChance";

    /**
     * Serializer key "length".
     *
     * @var string
     */
    const LENGTH = "length";

    /**
     * Serializer key "new".
     *
     * @var string
     */
    const NEW = "new";

    /**
     * Serializer key "original language".
     *
     * @var string
     */
    const ORIG_LANGUAGE = "origLanguage";

    /**
     * Serializer key "PDC start".
     *
     * @var string
     */
    const PDC_START = "pdcStart";

    /**
     * Serializer key "premiere".
     *
     * @var string
     */
    const PREMIERE = "premiere";

    /**
     * Serializer key "present".
     *
     * @var string
     */
    const PRESENT = "present";

    /**
     * Serializer key "presenters".
     *
     * @var string
     */
    const PRESENTERS = "presenters";

    /**
     * Serializer key "previously shown".
     *
     * @var string
     */
    const PREVIOUSLY_SHOWN = "previouslyShown";

    /**
     * Serializer key "producers".
     *
     * @var string
     */
    const PRODUCERS = "producers";

    /**
     * Serializer key "programmes".
     *
     * @var string
     */
    const PROGRAMMES = "programmes";

    /**
     * Serializer key "quality".
     *
     * @var string
     */
    const QUALITY = "quality";

    /**
     * Serializer key "ratings".
     *
     * @var string
     */
    const RATINGS = "ratings";

    /**
     * Serializer key "reviewer".
     *
     * @var string
     */
    const REVIEWER = "reviewer";

    /**
     * Serializer key "reviews".
     *
     * @var string
     */
    const REVIEWS = "reviews";

    /**
     * Serializer key "role".
     *
     * @var string
     */
    const ROLE = "role";

    /**
     * Serializer key "secondary titles".
     *
     * @var string
     */
    const SECONDARY_TITLES = "secondaryTitles";

    /**
     * Serializer key "Show view".
     *
     * @var string
     */
    const SHOW_VIEW = "showView";

    /**
     * Serializer key "source".
     *
     * @var string
     */
    const SOURCE = "source";

    /**
     * Serializer key "source data URL".
     *
     * @var string
     */
    const SOURCE_DATA_URL = "sourceDataUrl";

    /**
     * Serializer key "source info name".
     *
     * @var string
     */
    const SOURCE_INFO_NAME = "sourceInfoName";

    /**
     * Serializer key "source info URL".
     *
     * @var string
     */
    const SOURCE_INFO_URL = "sourceInfoUrl";

    /**
     * Serializer key "src".
     *
     * @var string
     */
    const SRC = "src";

    /**
     * Serializer key "start".
     *
     * @var string
     */
    const START = "start";

    /**
     * Serializer key "star ratings".
     *
     * @var string
     */
    const STAR_RATINGS = "starRatings";

    /**
     * Serializer key "stereo".
     *
     * @var string
     */
    const STEREO = "stereo";

    /**
     * Serializer key "stop".
     *
     * @var string
     */
    const STOP = "stop";

    /**
     * Serializer key "subtitles".
     *
     * @var string
     */
    const SUBTITLES = "subtitles";

    /**
     * Serializer key "system".
     *
     * @var string
     */
    const SYSTEM = "system";

    /**
     * Serializer key "titles".
     *
     * @var string
     */
    const TITLES = "titles";

    /**
     * Serializer key "type".
     *
     * @var string
     */
    const TYPE = "type";

    /**
     * Serializer key "units".
     *
     * @var string
     */
    const UNITS = "units";

    /**
     * Serializer key "URLs".
     *
     * @var string
     */
    const URLS = "urls";

    /**
     * Serializer key "value".
     *
     * @var string
     */
    const VALUE = "value";

    /**
     * Serializer key "video".
     *
     * @var string
     */
    const VIDEO = "video";

    /**
     * Serializer key "video plus".
     *
     * @var string
     */
    const VIDEO_PLUS = "videoPlus";

    /**
     * Serializer key "VPS start".
     *
     * @var string
     */
    const VPS_START = "vpsStart";

    /**
     * Serializer key "width".
     *
     * @var string
     */
    const WIDTH = "width";

    /**
     * Serializer key "writers".
     *
     * @var string
     */
    const WRITERS = "writers";
}