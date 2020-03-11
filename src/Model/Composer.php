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

use WBW\Library\XMLTV\Serializer\XmlSerializer;

/**
 * Composer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Composer extends AbstractCredit {

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize() {
        return XmlSerializer::serializeComposer($this);
    }
}
