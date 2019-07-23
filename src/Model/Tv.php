<?php

/*
 * Disclaimer: This source code is protected by copyright law and by
 * international conventions.
 *
 * Any reproduction or partial or total distribution of the source code, by any
 * means whatsoever, is strictly forbidden.
 *
 * Anyone not complying with these provisions will be guilty of the offense of
 * infringement and the penal sanctions provided for by law.
 *
 * (c) 2019 All rights reserved.
 */

namespace WBW\Library\XMLTV\Model;

/**
 * TV.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Tv extends AbstractModel {

    /**
     * Channels.
     *
     * @var Channel[]
     */
    private $channels;

    /**
     * Date.
     *
     * @var string
     */
    private $date;

    /**
     * Generator info name.
     *
     * @var string
     */
    private $generatorInfoName;

    /**
     * Generator info URL.
     *
     * @var string
     */
    private $generatorInfoURL;

    /**
     * Programmes.
     *
     * @var Programme[]
     */
    private $programmes;

    /**
     * Source data URL.
     *
     * @var string
     */
    private $sourceDataURL;

    /**
     * Source info name.
     *
     * @var string
     */
    private $sourceInfoName;

    /**
     * Source info URL.
     *
     * @var string
     */
    private $sourceInfoURL;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->setChannels([]);
        $this->setProgrammes([]);
    }

    /**
     * Add a channel.
     *
     * @param Channel $channel The channel.
     * @return Tv Returns this TV.
     */
    public function addChannel(Channel $channel) {
        $this->channels[] = $channel;
        return $this;
    }

    /**
     * Add a programme.
     *
     * @param Programme $programme The programme.
     * @return Tv Returns this TV.
     */
    public function addProgramme(Programme $programme) {
        $this->programmes[] = $programme;
        return $this;
    }

    /**
     * Get the channels.
     *
     * @return Channel[] Returns the channels.
     */
    public function getChannels() {
        return $this->channels;
    }

    /**
     * Get the date.
     *
     * @return string Returns the date.
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Get the generator info name.
     *
     * @return string Returns the generator info name.
     */
    public function getGeneratorInfoName() {
        return $this->generatorInfoName;
    }

    /**
     * Get the generator info URL.
     *
     * @return string Returns the generator info URL.
     */
    public function getGeneratorInfoURL() {
        return $this->generatorInfoURL;
    }

    /**
     * Get the programmes.
     *
     * @return Programme[] Returns the programmes.
     */
    public function getProgrammes() {
        return $this->programmes;
    }

    /**
     * Get the source data URL.
     *
     * @return string Returns the source data URL.
     */
    public function getSourceDataURL() {
        return $this->sourceDataURL;
    }

    /**
     * Get the source info name.
     *
     * @return string Returns the source info name.
     */
    public function getSourceInfoName() {
        return $this->sourceInfoName;
    }

    /**
     * Get the source info URL.
     *
     * @return string Returns the source info URL.
     */
    public function getSourceInfoURL() {
        return $this->sourceInfoURL;
    }

    /**
     * Determines if this TV has channels.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasChannels() {
        return 1 <= count($this->channels);
    }

    /**
     * Determines if this TV has programmes.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasProgrammes() {
        return 1 <= count($this->programmes);
    }

    /**
     * Set the channels.
     *
     * @param Channel[] $channels The channels.
     * @return Tv Returns this TV.
     */
    protected function setChannels(array $channels) {
        $this->channels = $channels;
        return $this;
    }

    /**
     * Set the date.
     *
     * @param string $date The date.
     * @return Tv Returns this TV.
     */
    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    /**
     * Set the generator info name.
     *
     * @param string $generatorInfoName The generator info name.
     * @return Tv Returns this TV.
     */
    public function setGeneratorInfoName($generatorInfoName) {
        $this->generatorInfoName = $generatorInfoName;
        return $this;
    }

    /**
     * Set the generator info URL.
     *
     * @param string $generatorInfoURL The generator info URL.
     * @return Tv Returns this TV.
     */
    public function setGeneratorInfoURL($generatorInfoURL) {
        $this->generatorInfoURL = $generatorInfoURL;
        return $this;
    }

    /**
     * Set the programmes.
     *
     * @param Programme[] $programmes The programmes.
     * @return Tv Returns this TV.
     */
    protected function setProgrammes(array $programmes) {
        $this->programmes = $programmes;
        return $this;
    }

    /**
     * Set the source data URL.
     *
     * @param string $sourceDataURL The source data URL.
     * @return Tv Returns this TV.
     */
    public function setSourceDataURL($sourceDataURL) {
        $this->sourceDataURL = $sourceDataURL;
        return $this;
    }

    /**
     * Set the source info name.
     *
     * @param string $sourceInfoName The source info name.
     * @return Tv Returns this TV.
     */
    public function setSourceInfoName($sourceInfoName) {
        $this->sourceInfoName = $sourceInfoName;
        return $this;
    }

    /**
     * Set the source info URL.
     *
     * @param string $sourceInfoURL The source info URL.
     * @return Tv Returns this TV.
     */
    public function setSourceInfoURL($sourceInfoURL) {
        $this->sourceInfoURL = $sourceInfoURL;
        return $this;
    }
}
