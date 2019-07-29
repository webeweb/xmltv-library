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

use WBW\Library\XMLTV\Traits\ChannelsTrait;
use WBW\Library\XMLTV\Traits\ProgrammesTrait;

/**
 * TV.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Tv extends AbstractModel {

    use ChannelsTrait;
    use ProgrammesTrait;

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
     * Indexes the programmes.
     *
     * @return void
     */
    public function indexProgrammes() {

        /** @var Programme $current */
        foreach ($this->programmes as $current) {

            $channel = $this->getChannelById($current->getChannel());
            if (null !== $channel) {
                $channel->addProgramme($current);
            }
        }
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
