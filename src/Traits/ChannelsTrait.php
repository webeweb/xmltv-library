<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Traits;

use WBW\Library\XMLTV\Model\Channel;

/**
 * Channels trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait ChannelsTrait {

    /**
     * Channels.
     *
     * @var Channel[]
     */
    private $channels;

    /**
     * Channels index.
     *
     * @var Channel[]
     */
    private $channelsIndex;

    /**
     * Add a channel.
     *
     * @param Channel $channel The channel.
     */
    public function addChannel(Channel $channel) {
        $this->channels[] = $channel;
        return $this->indexChannel($channel);
    }

    /**
     * Get a channel by id.
     *
     * @param string $id The channel id.
     * @return Channel|null Returns the channel.
     */
    public function getChannelById($id) {
        $this->initChannelsIndex();
        if (false === array_key_exists($id, $this->channelsIndex)) {
            return null;
        }
        return $this->channelsIndex[$id];
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
     * Determines if this instance has channels.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasChannels() {
        return 1 <= count($this->channels);
    }

    /**
     * Index a channel.
     *
     * @param Channel $channel The channel.
     */
    protected function indexChannel(Channel $channel) {
        $this->initChannelsIndex();
        $this->channelsIndex[$channel->getId()] = $channel;
        return $this;
    }

    /**
     * Initializes the channels index.
     *
     * @return void
     */
    protected function initChannelsIndex() {
        if (null === $this->channelsIndex) {
            $this->channelsIndex = [];
        }
    }

    /**
     * Set the channels.
     *
     * @param Channel[] $channels The channels.
     */
    protected function setChannels(array $channels) {
        $this->channels = $channels;
        return $this;
    }
}
