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
class TV extends AbstractModel {

    /**
     * Channels.
     *
     * @var Channel[]
     */
    private $channels;

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
     * @return TV Returns this TV.
     */
    public function addChannel(Channel $channel) {
        $this->channels[] = $channel;
        return $this;
    }

    /**
     * Add a programme.
     *
     * @param Programme $programme The programme.
     * @return TV Returns this TV.
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
     * Get the source info URL.
     *
     * @return string Returns the source info URL.
     */
    public function getSourceInfoURL() {
        return $this->sourceInfoURL;
    }

    /**
     * Set the channels.
     *
     * @param Channel[] $channels The channels.
     * @return TV Returns this TV.
     */
    protected function setChannels(array $channels) {
        $this->channels = $channels;
        return $this;
    }

    /**
     * Set the generator info name.
     *
     * @param string $generatorInfoName The generator info name.
     * @return TV Returns this TV.
     */
    public function setGeneratorInfoName($generatorInfoName) {
        $this->generatorInfoName = $generatorInfoName;
        return $this;
    }

    /**
     * Set the generator info URL.
     *
     * @param string $generatorInfoURL The generator info URL.
     * @return TV Returns this TV.
     */
    public function setGeneratorInfoURL($generatorInfoURL) {
        $this->generatorInfoURL = $generatorInfoURL;
        return $this;
    }

    /**
     * Set the programmes.
     *
     * @param Programme[] $programmes The programmes.
     * @return TV Returns this TV.
     */
    protected function setProgrammes(array $programmes) {
        $this->programmes = $programmes;
        return $this;
    }

    /**
     * Set the source data URL.
     *
     * @param string $sourceDataURL The source data URL.
     * @return TV Returns this TV.
     */
    public function setSourceDataURL($sourceDataURL) {
        $this->sourceDataURL = $sourceDataURL;
        return $this;
    }

    /**
     * Set the source info URL.
     *
     * @param string $sourceInfoURL The source info URL.
     * @return TV Returns this TV.
     */
    public function setSourceInfoURL($sourceInfoURL) {
        $this->sourceInfoURL = $sourceInfoURL;
        return $this;
    }
}
