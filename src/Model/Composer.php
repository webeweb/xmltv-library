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

use WBW\Library\XmlTv\Serializer\XmlSerializer;

/**
 * Composer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Model
 */
class Composer extends AbstractCredit {

    /**
     * DOM node name.
     *
     * @var string
     */
    public const DOM_NODE_NAME = "composer";

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeComposer($this);
    }
}
