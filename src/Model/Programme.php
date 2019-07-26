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

use WBW\Library\XMLTV\Traits\ChannelTrait;
use WBW\Library\XMLTV\Traits\IconsTrait;
use WBW\Library\XMLTV\Traits\LanguageTrait;
use WBW\Library\XMLTV\Traits\UrlsTrait;

/**
 * Programme.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Programme extends AbstractModel {

    use ChannelTrait;
    use IconsTrait;
    use LanguageTrait;
    use UrlsTrait;

    /**
     * Audio.
     *
     * @var Audio
     */
    private $audio;

    /**
     * Categories.
     *
     * @var Category[]
     */
    private $categories;

    /**
     * Clump Idx
     *
     * @var bool
     */
    private $clumpIdx;

    /**
     * Countries.
     *
     * @var Country[]
     */
    private $countries;

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
     * Descriptions.
     *
     * @var Desc[]
     */
    private $descs;

    /**
     * Episode nums.
     *
     * @var EpisodeNum[]
     */
    private $episodeNums;

    /**
     * Keywords.
     *
     * @var Keyword[]
     */
    private $keywords;

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
     * Ratings.
     *
     * @var Rating[]
     */
    private $ratings;
    /**
     * Star ratings.
     *
     * @var StarRating[]
     */
    private $starRatings;

    /**
     * Reviews.
     *
     * @var Review[]
     */
    private $reviews;

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
     * SubTitles.
     *
     * @var SubTitle[]
     */
    private $subTitles;

    /**
     * Titles.
     *
     * @var Title[]
     */
    private $titles;

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
     * Add a category.
     *
     * @param Category $category The category.
     * @return Programme Returns this programme.
     */
    public function addCategory(Category $category) {
        $this->categories[] = $category;
        return $this;
    }

    /**
     * Add a country.
     *
     * @param Country $country The country.
     * @return Programme Returns this programme.
     */
    public function addCountry(Country $country) {
        $this->countries[] = $country;
        return $this;
    }

    /**
     * Add a description.
     *
     * @param Desc $desc The description.
     * @return Programme Returns this programme.
     */
    public function addDesc(Desc $desc) {
        $this->descs[] = $desc;
        return $this;
    }

    /**
     * Add an episode num.
     *
     * @param EpisodeNum $episodeNum The episode num.
     * @return Programme Returns this programme.
     */
    public function addEpisodeNum(EpisodeNum $episodeNum) {
        $this->episodeNums[] = $episodeNum;
        return $this;
    }

    /**
     * Add a keyword.
     *
     * @param Keyword $keyword The keyword.
     * @return Programme Returns this programme.
     */
    public function addKeyword(Keyword $keyword) {
        $this->keywords[] = $keyword;
        return $this;
    }

    /**
     * Add a rating.
     *
     * @param Rating $rating The rating.
     * @return Programme Returns this programme.
     */
    public function addRating(Rating $rating) {
        $this->ratings[] = $rating;
        return $this;
    }
    /**
     * Add a star rating.
     *
     * @param StarRating $starRating The star rating.
     * @return Programme Returns this programme.
     */
    public function addStarRating(StarRating $starRating) {
        $this->starRatings[] = $starRating;
        return $this;
    }

    /**
     * Add a review.
     *
     * @param Review $review The review.
     * @return Programme Returns this programme.
     */
    public function addReview(Review $review) {
        $this->reviews[] = $review;
        return $this;
    }

    /**
     * Add a sub-title.
     *
     * @param SubTitle $subTitle The sub-title.
     * @return Programme Returns this programme.
     */
    public function addSubTitle(SubTitle $subTitle) {
        $this->subTitles[] = $subTitle;
        return $this;
    }

    /**
     * Add a title.
     *
     * @param Title $title The title.
     * @return Programme Returns this programme.
     */
    public function addTitle(Title $title) {
        $this->titles[] = $title;
        return $this;
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
     * Get the categories.
     *
     * @return Category[] Returns the categories.
     */
    public function getCategories() {
        return $this->categories;
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
     * Get the countries.
     *
     * @return Country[] Returns the countries.
     */
    public function getCountries() {
        return $this->countries;
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
     * Get the descriptions.
     *
     * @return Desc[] Returns the descriptions.
     */
    public function getDescs() {
        return $this->descs;
    }

    /**
     * Get the episode nums.
     *
     * @return EpisodeNum[] Returns the episode nums.
     */
    public function getEpisodeNums() {
        return $this->episodeNums;
    }

    /**
     * Get the keywords.
     *
     * @return Keyword[] Returns the keywords.
     */
    public function getKeywords() {
        return $this->keywords;
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
     * Get the ratings.
     *
     * @return Rating[] Returns the ratings.
     */
    public function getRatings() {
        return $this->ratings;
    }
    /**
     * Get the star ratings.
     *
     * @return StarRating[] Returns the star ratings.
     */
    public function getStarRatings() {
        return $this->starRatings;
    }

    /**
     * Get the reviews.
     *
     * @return Review[] Returns the reviews.
     */
    public function getReviews() {
        return $this->reviews;
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
     * Get the sub-titles.
     *
     * @return SubTitle[] Returns the sub-titles.
     */
    public function getSubTitles() {
        return $this->subTitles;
    }

    /**
     * Get the titles.
     *
     * @return Title[] Returns the titles.
     */
    public function getTitles() {
        return $this->titles;
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
     * Determines if this programme has categories.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasCategories() {
        return 1 <= count($this->categories);
    }

    /**
     * Determines if this programme has countries.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasCountries() {
        return 1 <= count($this->countries);
    }

    /**
     * Determines if this programme has descriptions.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasDescs() {
        return 1 <= count($this->descs);
    }

    /**
     * Determines if this programme has episode nums.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasEpisodeNums() {
        return 1 <= count($this->episodeNums);
    }

    /**
     * Determines if this programme has keywords.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasKeywords() {
        return 1 <= count($this->keywords);
    }

    /**
     * Determines if this programme has star ratings.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasStarRatings() {
        return 1 <= count($this->starRatings);
    }

    /**
     * Determines if this programme has ratings.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasRatings() {
        return 1 <= count($this->ratings);
    }

    /**
     * Determines if this programme has reviews.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasReviews() {
        return 1 <= count($this->reviews);
    }

    /**
     * Determines if this programme has sub-titles.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasSubTitles() {
        return 1 <= count($this->subTitles);
    }

    /**
     * Determines if this programme has titles.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasTitles() {
        return 1 <= count($this->titles);
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
     * Set the categories.
     *
     * @param Category[] $categories The categories.
     * @return Programme Returns this programme.
     */
    protected function setCategories(array $categories) {
        $this->categories = $categories;
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
     * Set the countries.
     *
     * @param Country[] $countries The countries.
     * @return Programme Returns this programme.
     */
    public function setCountries(array $countries) {
        $this->countries = $countries;
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
     * Set the descriptions.
     *
     * @param Desc[] $descs The descriptions.
     * @return Programme Returns this programme.
     */
    protected function setDescs(array $descs) {
        $this->descs = $descs;
        return $this;
    }

    /**
     * Set the episode nums.
     *
     * @param EpisodeNum[] $episodeNums The episode nums.
     * @return Programme Returns this programme.
     */
    protected function setEpisodeNums(array $episodeNums) {
        $this->episodeNums = $episodeNums;
        return $this;
    }

    /**
     * Set the keywords.
     *
     * @param Keyword[] $keywords The keywords.
     * @return Programme Returns this programme.
     */
    protected function setKeywords(array $keywords) {
        $this->keywords = $keywords;
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
     * Set the ratings.
     *
     * @param Rating[] $ratings The ratings.
     * @return Programme Returns this programme.
     */
    protected function setRatings(array $ratings) {
        $this->ratings = $ratings;
        return $this;
    }
    /**
     * Set the star ratings.
     *
     * @param StarRating[] $starRatings The ratings.
     * @return Programme Returns this programme.
     */
    protected function setStarRatings(array $starRatings) {
        $this->starRatings = $starRatings;
        return $this;
    }

    /**
     * Set the reviews.
     *
     * @param Review[] $reviews The reviews.
     * @return Programme Returns this programme.
     */
    protected function setReviews(array $reviews) {
        $this->reviews = $reviews;
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
     * Set the sub-titles.
     *
     * @param SubTitle[] $subTitles The sub-titles.
     * @return Programme Returns this programme.
     */
    protected function setSubTitles(array $subTitles) {
        $this->subTitles = $subTitles;
        return $this;
    }

    /**
     * Set the titles.
     *
     * @param Title[] $titles The titles.
     * @return Programme Returns this programme.
     */
    protected function setTitles(array $titles) {
        $this->titles = $titles;
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
