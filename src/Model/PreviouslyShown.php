<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Model;

use WBW\Library\XmlTv\Model\Attribute\StringChannelTrait;
use WBW\Library\XmlTv\Model\Attribute\StringStartTrait;
use WBW\Library\XmlTv\Serializer\JsonSerializer;
use WBW\Library\XmlTv\Serializer\XmlSerializer;

/**
 * Previously shown.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Model
 */
class PreviouslyShown extends AbstractModel {

    use StringChannelTrait;
    use StringStartTrait;

    /**
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "previously-shown";

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializePreviouslyShown($this);
    }

    /**
     * {@inheritdoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializePreviouslyShown($this);
    }
}
