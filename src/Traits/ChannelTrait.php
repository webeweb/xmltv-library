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

/**
 * Channel trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait ChannelTrait {

    /**
     * Channel.
     *
     * @var string
     */
    private $channel;

    /**
     * Get the channel.
     *
     * @return string Returns the channel.
     */
    public function getChannel() {
        return $this->channel;
    }

    /**
     * Set the channel.
     *
     * @param string $channel The channel.
     * @return ChannelTrait Returns this channel trait.
     */
    public function setChannel($channel) {
        $this->channel = $channel;
        return $this;
    }
}
