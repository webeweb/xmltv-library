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

use WBW\Library\Core\Model\Attribute\StringContentTrait;
use WBW\Library\XMLTV\Serializer\JsonSerializer;
use WBW\Library\XMLTV\Serializer\XmlSerializer;

/**
 * Stereo.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
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
            Stereo::CONTENT_BILINGUAL,
            Stereo::CONTENT_DOLBY,
            Stereo::CONTENT_DOLBY_DIGITAL,
            Stereo::CONTENT_MONO,
            Stereo::CONTENT_STEREO,
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
