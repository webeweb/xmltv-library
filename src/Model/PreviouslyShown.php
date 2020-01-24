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

use WBW\Library\XMLTV\Model\Attribute\ChannelTrait;
use WBW\Library\XMLTV\Model\Attribute\StringStartTrait;

/**
 * Previously shown.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class PreviouslyShown extends AbstractModel {

    use ChannelTrait;
    use StringStartTrait;

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return [
            "channel" => static::serializeModel($this->getChannel()),
            "start"   => $this->getStart(),
        ];
    }
}
