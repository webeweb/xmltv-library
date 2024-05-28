<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\XmlTv\Model;

use WBW\Library\XmlTv\Serializer\XmlSerializer;

/**
 * Commentator.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Model
 */
class Commentator extends AbstractCredit {

    /**
     * DOM node name.
     *
     * @var string
     */
    public const DOM_NODE_NAME = "commentator";

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeCommentator($this);
    }
}
