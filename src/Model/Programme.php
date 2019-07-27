<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Model;

use WBW\Library\XMLTV\Traits\CategoriesTrait;
use WBW\Library\XMLTV\Traits\ChannelTrait;
use WBW\Library\XMLTV\Traits\CountriesTrait;
use WBW\Library\XMLTV\Traits\DescsTrait;
use WBW\Library\XMLTV\Traits\EpisodeNumsTrait;
use WBW\Library\XMLTV\Traits\IconsTrait;
use WBW\Library\XMLTV\Traits\KeywordsTrait;
use WBW\Library\XMLTV\Traits\LanguageTrait;
use WBW\Library\XMLTV\Traits\RatingsTrait;
use WBW\Library\XMLTV\Traits\ReviewsTrait;
use WBW\Library\XMLTV\Traits\StarRatingsTrait;
use WBW\Library\XMLTV\Traits\SubTitlesTrait;
use WBW\Library\XMLTV\Traits\TitlesTrait;
use WBW\Library\XMLTV\Traits\UrlsTrait;

/**
 * Programme.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Programme extends AbstractModel {

    use CategoriesTrait;
    use ChannelTrait;
    use CountriesTrait;
    use DescsTrait;
    use EpisodeNumsTrait;
    use IconsTrait;
    use KeywordsTrait;
    use LanguageTrait;
    use RatingsTrait;
    use ReviewsTrait;
    use StarRatingsTrait;
    use SubTitlesTrait;
    use TitlesTrait;
    use UrlsTrait;

    /**
     * Audio.
     *
     * @var Audio
     */
    private $audio;

    /**
     * Clump Idx
     *
     * @var bool
     */
    private $clumpIdx;

    /**
     * Credits.
     *
     * @var Credits
     */
    private $credits;

    /**
     * Date.
     *
     * @var Date
     */
    private $date;

    /**
     * Last chance.
     *
     * @var LastChance
     */
    private $lastChance;

    /**
     * Length.
     *
     * @var Length
     */
    private $length;

    /**
     * PDC start.
     *
     * @var string
     */
    private $pdcStart;

    /**
     * Premiere.
     *
     * @var Premiere
     */
    private $premiere;

    /**
     * Previously shown.
     *
     * @var PreviouslyShown
     */
    private $previouslyShown;

    /**
     * Show view.
     *
     * @var string
     */
    private $showView;

    /**
     * Start.
     *
     * @var string
     */
    private $start;

    /**
     * Stop.
     *
     * @var string
     */
    private $stop;

    /**
     * Video.
     *
     * @var Video
     */
    private $video;

    /**
     * Video plus.
     *
     * @var string
     */
    private $videoPlus;

    /**
     * VPS start.
     *
     * @var string
     */
    private $vpsStart;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setCategories([]);
        $this->setCountries([]);
        $this->setDescs([]);
        $this->setEpisodeNums([]);
        $this->setIcons([]);
        $this->setKeywords([]);
        $this->setRatings([]);
        $this->setReviews([]);
        $this->setStarRatings([]);
        $this->setSubTitles([]);
        $this->setTitles([]);
        $this->setUrls([]);
    }

    /**
     * Get the audio.
     *
     * @return Audio Returns the audio.
     */
    public function getAudio() {
        return $this->audio;
    }

    /**
     * Get the clump idx.
     *
     * @return bool Returns the clump idx.
     */
    public function getClumpIdx() {
        return $this->clumpIdx;
    }

    /**
     * Get the credits.
     *
     * @return Credits Returns the credits.
     */
    public function getCredits() {
        return $this->credits;
    }

    /**
     * Get the date.
     *
     * @return Date Returns the date.
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Get the last chance.
     *
     * @return LastChance Returns the last chance.
     */
    public function getLastChance() {
        return $this->lastChance;
    }

    /**
     * Get the length.
     *
     * @return Length Returns the length.
     */
    public function getLength() {
        return $this->length;
    }

    /**
     * Get the PDC start.
     *
     * @return string Returns the PDC start.
     */
    public function getPdcStart() {
        return $this->pdcStart;
    }

    /**
     * Get the premiere.
     *
     * @return Premiere Returns the premiere.
     */
    public function getPremiere() {
        return $this->premiere;
    }

    /**
     * Get the previously shown.
     *
     * @return PreviouslyShown Returns the previously shown.
     */
    public function getPreviouslyShown() {
        return $this->previouslyShown;
    }

    /**
     * Get the show view.
     *
     * @return string Returns the show view.
     */
    public function getShowView() {
        return $this->showView;
    }

    /**
     * Get the start.
     *
     * @return string Returns the start.
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * Get the stop.
     *
     * @return string Returns the stop.
     */
    public function getStop() {
        return $this->stop;
    }

    /**
     * Get the video.
     *
     * @return Video Returns the video.
     */
    public function getVideo() {
        return $this->video;
    }

    /**
     * Get the video plus.
     *
     * @return string Returns the video plus.
     */
    public function getVideoPlus() {
        return $this->videoPlus;
    }

    /**
     * Get the VPS start.
     *
     * @return string Returns the VPS start.
     */
    public function getVpsStart() {
        return $this->vpsStart;
    }

    /**
     * Set the audio.
     *
     * @param Audio $audio The audio.
     * @return Programme Returns this programme.
     */
    public function setAudio($audio) {
        $this->audio = $audio;
        return $this;
    }

    /**
     * Set the clump idx.
     *
     * @param bool $clumpIdx The clump idx.
     * @return Programme Returns this programme.
     */
    public function setClumpIdx($clumpIdx) {
        $this->clumpIdx = $clumpIdx;
        return $this;
    }

    /**
     * Set the credits.
     *
     * @param Credits|null $credits The credits.
     * @return Programme Returns this programme.
     */
    public function setCredits(Credits $credits = null) {
        $this->credits = $credits;
        return $this;
    }

    /**
     * Set the date.
     *
     * @param Date|null $date The date.
     * @return Programme Returns this programme.
     */
    public function setDate(Date $date = null) {
        $this->date = $date;
        return $this;
    }

    /**
     * Set the last chance.
     *
     * @param LastChance $lastChance The last chance.
     * @return Programme Returns this instance.
     */
    public function setLastChance($lastChance) {
        $this->lastChance = $lastChance;
        return $this;
    }

    /**
     * Set the length.
     *
     * @param Length|null $length The length.
     * @return Programme Returns this programme.
     */
    public function setLength(Length $length = null) {
        $this->length = $length;
        return $this;
    }

    /**
     * Set the PDC start.
     *
     * @param string $pdcStart The PDC start.
     * @return Programme Returns this programme.
     */
    public function setPdcStart($pdcStart) {
        $this->pdcStart = $pdcStart;
        return $this;
    }

    /**
     * Set the premiere.
     *
     * @param Premiere $premiere The premiere.
     * @return Programme Returns this programme.
     */
    public function setPremiere($premiere) {
        $this->premiere = $premiere;
        return $this;
    }

    /**
     * Set the previously shown.
     *
     * @param PreviouslyShown $previouslyShown The previously shown.
     * @return Programme Returns this programme.
     */
    public function setPreviouslyShown($previouslyShown) {
        $this->previouslyShown = $previouslyShown;
        return $this;
    }

    /**
     * Set the show view.
     *
     * @param string $showView The show view.
     * @return Programme Returns this programme.
     */
    public function setShowView($showView) {
        $this->showView = $showView;
        return $this;
    }

    /**
     * Set the start.
     *
     * @param string $start The start.
     * @return Programme Returns this programme.
     */
    public function setStart($start) {
        $this->start = $start;
        return $this;
    }

    /**
     * Set the stop.
     *
     * @param string $stop The stop.
     * @return Programme Returns this programme.
     */
    public function setStop($stop) {
        $this->stop = $stop;
        return $this;
    }

    /**
     * Set the video.
     *
     * @param Video $video The video.
     * @return Programme Returns this programme.
     */
    public function setVideo($video) {
        $this->video = $video;
        return $this;
    }

    /**
     * Set the video plus.
     *
     * @param string $videoPlus The video plus.
     * @return Programme Returns this programme.
     */
    public function setVideoPlus($videoPlus) {
        $this->videoPlus = $videoPlus;
        return $this;
    }

    /**
     * Set the VPS start.
     *
     * @param string $vpsStart The VPS start.
     * @return Programme Returns this programme.
     */
    public function setVpsStart($vpsStart) {
        $this->vpsStart = $vpsStart;
        return $this;
    }
}
