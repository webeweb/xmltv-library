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

use WBW\Library\XMLTV\Model\Attribute\StringChannelTrait;
use WBW\Library\XMLTV\Model\Attribute\StringStartTrait;

/**
 * Previously shown.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class PreviouslyShown extends AbstractModel {

    use StringChannelTrait;
    use StringStartTrait;

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return [
            "channel" => $this->getChannel(),
            "start"   => $this->getStart(),
        ];
    }
}
