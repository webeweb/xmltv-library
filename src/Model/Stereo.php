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
use WBW\Library\XmlTv\Serializer\JsonSerializer;
use WBW\Library\XmlTv\Serializer\XmlSerializer;

/**
 * Stereo.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Model
 */
class Stereo extends AbstractModel {

    use StringContentTrait;

    /**
     * Content "bilingual".
     *
     * @var string
     */
    const CONTENT_BILINGUAL = "bilingual";

    /**
     * Content "dolby".
     *
     * @var string
     */
    const CONTENT_DOLBY = "dolby";

    /**
     * Content "dolby digital".
     *
     * @var string
     */
    const CONTENT_DOLBY_DIGITAL = "dolby digital";

    /**
     * Content "mono".
     *
     * @var string
     */
    const CONTENT_MONO = "mono";

    /**
     * Content "stereo".
     *
     * @var string
     */
    const CONTENT_STEREO = "stereo";

    /**
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "stereo";

    /**
     * Enumerate the content.
     *
     * @return string[] Returns the content enumeration.
     */
    public static function enumContent(): array {
        return [
            self::CONTENT_BILINGUAL,
            self::CONTENT_DOLBY,
            self::CONTENT_DOLBY_DIGITAL,
            self::CONTENT_MONO,
            self::CONTENT_STEREO,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeStereo($this);
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeStereo($this);
    }
}
