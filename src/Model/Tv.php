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

use WBW\Library\XMLTV\Model\Attribute\ArrayChannelsTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayProgrammesTrait;

/**
 * TV.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Tv extends AbstractModel {

    use ArrayChannelsTrait;
    use ArrayProgrammesTrait;

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
    private $generatorInfoUrl;

    /**
     * Source data URL.
     *
     * @var string
     */
    private $sourceDataUrl;

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
    private $sourceInfoUrl;

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
    public function getGeneratorInfoUrl() {
        return $this->generatorInfoUrl;
    }

    /**
     * Get the source data URL.
     *
     * @return string Returns the source data URL.
     */
    public function getSourceDataUrl() {
        return $this->sourceDataUrl;
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
    public function getSourceInfoUrl() {
        return $this->sourceInfoUrl;
    }

    /**
     * Indexes the programmes by channel.
     *
     * @return Tv Returns this TV.
     */
    public function indexProgrammesByChannel() {

        $this->sortChannels();
        $this->sortProgrammes();

        $channels = $this->indexChannelsById();

        /** @var Programme $current */
        foreach ($this->programmes as $current) {
            if (true === array_key_exists($current->getChannel(), $channels)) {
                $channels[$current->getChannel()]->addProgramme($current);
            }
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return [
            "channels"          => static::serializeArray($this->getChannels()),
            "date"              => $this->getDate(),
            "generatorInfoName" => $this->getGeneratorInfoName(),
            "generatorInfoUrl"  => $this->getGeneratorInfoUrl(),
            "sourceDataUrl"     => $this->getSourceDataUrl(),
            "sourceInfoName"    => $this->getSourceInfoName(),
            "sourceInfoUrl"     => $this->getSourceInfoUrl(),
            "programmes"        => static::serializeArray($this->getProgrammes()),
        ];
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
     * @param string $generatorInfoUrl The generator info URL.
     * @return Tv Returns this TV.
     */
    public function setGeneratorInfoUrl($generatorInfoUrl) {
        $this->generatorInfoUrl = $generatorInfoUrl;
        return $this;
    }

    /**
     * Set the source data URL.
     *
     * @param string $sourceDataUrl The source data URL.
     * @return Tv Returns this TV.
     */
    public function setSourceDataUrl($sourceDataUrl) {
        $this->sourceDataUrl = $sourceDataUrl;
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
     * @param string $sourceInfoUrl The source info URL.
     * @return Tv Returns this TV.
     */
    public function setSourceInfoUrl($sourceInfoUrl) {
        $this->sourceInfoUrl = $sourceInfoUrl;
        return $this;
    }
}
