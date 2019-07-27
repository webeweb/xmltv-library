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
     * Add an channel.
     *
     * @param Channel $channel The channel.
     * @return ChannelsTrait Returns this channels trait.
     */
    public function addChannel(Channel $channel) {
        $this->channels[] = $channel;
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
     * Determines if this instance has channels.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasChannels() {
        return 1 <= count($this->channels);
    }

    /**
     * Set the channels.
     *
     * @param Channel[] $channels The channels.
     * @return ChannelsTrait Returns this channels trait.
     */
    protected function setChannels(array $channels) {
        $this->channels = $channels;
        return $this;
    }
}