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

use WBW\Library\Traits\Strings\StringContentTrait;
use WBW\Library\Traits\Strings\StringLangTrait;
use WBW\Library\XmlTv\Serializer\JsonSerializer;
use WBW\Library\XmlTv\Serializer\XmlSerializer;

/**
 * Category.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Model
 */
class Category extends AbstractModel {

    use StringContentTrait;
    use StringLangTrait;

    /**
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "category";

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeCategory($this);
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeCategory($this);
    }
}
