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

class Programme extends AbstractModel {

    /**
     * Category.
     *
     * @var Category
     */
    private $category;

    /**
     * Channel.
     *
     * @var string
     */
    private $channel;

    /**
     * Country.
     *
     * @var Country
     */
    private $country;

    /**
     * Date.
     *
     * @var Date
     */
    private $date;

    /**
     * Icon.
     *
     * @var Icon
     */
    private $icon;

    /**
     * Length.
     *
     * @var Length
     */
    private $length;

    /**
     * Rating.
     *
     * @var Rating
     */
    private $rating;

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
     * Title.
     *
     * @var Title
     */
    private $title;

    /**
     * Get the category.
     *
     * @return Category Returns the category.
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Get the channel.
     *
     * @return string Returns the channel.
     */
    public function getChannel() {
        return $this->channel;
    }

    /**
     * Get the country.
     *
     * @return Country Returns the country.
     */
    public function getCountry() {
        return $this->country;
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
     * Get the icon.
     *
     * @return Icon Returns the icon.
     */
    public function getIcon() {
        return $this->icon;
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
     * Get the rating.
     *
     * @return Rating Returns the rating.
     */
    public function getRating() {
        return $this->rating;
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
     * Get the title.
     *
     * @return Title Returns the title.
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set the category.
     *
     * @param Category|null $category The category.
     * @return Programme Returns this programme.
     */
    public function setCategory(Category $category = null) {
        $this->category = $category;
        return $this;
    }

    /**
     * Set the channel.
     *
     * @param string $channel The channel.
     * @return Programme Returns this programme.
     */
    public function setChannel($channel) {
        $this->channel = $channel;
        return $this;
    }

    /**
     * Set the country.
     *
     * @param Country|null $country The country.
     * @return Programme Returns this programme.
     */
    public function setCountry(Country $country = null) {
        $this->country = $country;
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
     * Set the icon.
     *
     * @param Icon|null $icon The icon.
     * @return Programme Returns this programme.
     */
    public function setIcon(Icon $icon = null) {
        $this->icon = $icon;
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
     * Set the rating.
     *
     * @param Rating|null $rating The rating.
     * @return Programme Returns this programme.
     */
    public function setRating(Rating $rating = null) {
        $this->rating = $rating;
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
     * Set the title.
     *
     * @param Title|null $title The title.
     * @return Programme Returns this programme.
     */
    public function setTitle(Title $title = null) {
        $this->title = $title;
        return $this;
    }
}
