<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Model\Attribute;

/**
 * String channel trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Model\Attribute
 */
trait StringChannelTrait {

    /**
     * Channel.
     *
     * @var string|null
     */
    protected $channel;

    /**
     * Get the channel.
     *
     * @return string|null Returns the channel.
     */
    public function getChannel(): ?string {
        return $this->channel;
    }

    /**
     * Set the channel.
     *
     * @param string|null $channel The channel.
     * @return self Returns this instance.
     */
    public function setChannel(?string $channel): self {
        $this->channel = $channel;
        return $this;
    }
}
