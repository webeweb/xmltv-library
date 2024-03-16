<?php

declare(strict_types = 1);

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
 * Country.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Model
 */
class Country extends AbstractModel {

    use StringContentTrait;
    use StringLangTrait;

    /**
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "country";

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeCountry($this);
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeCountry($this);
    }
}
