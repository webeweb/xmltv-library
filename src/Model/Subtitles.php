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

use InvalidArgumentException;
use WBW\Library\Core\Model\Attribute\StringTypeTrait;
use WBW\Library\XMLTV\Model\Attribute\LanguageTrait;
use WBW\Library\XMLTV\Serializer\JsonSerializer;
use WBW\Library\XMLTV\Serializer\XmlSerializer;

/**
 * Subtitles.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Subtitles extends AbstractModel {

    use LanguageTrait;
    use StringTypeTrait;

    /**
     * Type "deaf signed".
     *
     * @var string
     */
    const TYPE_DEAF_SIGNED = "deaf-signed";

    /**
     * Type "onscreen".
     *
     * @var string
     */
    const TYPE_ONSCREEN = "onscreen";

    /**
     * Type "teletext".
     *
     * @var string
     */
    const TYPE_TELETEXT = "teletext";

    /**
     * Enumerate the type.
     *
     * @return array Returns the type enumeration
     */
    public static function enumType() {
        return [
            self::TYPE_DEAF_SIGNED,
            self::TYPE_ONSCREEN,
            self::TYPE_TELETEXT,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return JsonSerializer::serializeSubtitles($this);
    }

    /**
     * Set the type.
     *
     * @param string $type The type.
     * @return Subtitles Returns this subtitles.
     * @throws InvalidArgumentException Throws an invalid argument exception if the type is invalid.
     */
    public function setType($type) {
        if (null !== $type && false === in_array($type, static::enumType())) {
            throw new InvalidArgumentException(sprintf("The type \"%s\" is invalid", $type));
        }
        $this->type = $type;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize() {
        return XmlSerializer::serializeSubtitles($this);
    }
}
