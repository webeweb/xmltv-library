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
 * Producer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Producer extends AbstractCredit {

    /**
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "producer";

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeProducer($this);
    }
}
