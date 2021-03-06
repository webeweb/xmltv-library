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
use WBW\Library\Traits\Strings\StringTypeTrait;
use WBW\Library\XMLTV\Model\Attribute\LanguageLanguageTrait;
use WBW\Library\XMLTV\Serializer\JsonSerializer;
use WBW\Library\XMLTV\Serializer\XmlSerializer;

/**
 * Subtitles.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Subtitles extends AbstractModel {

    use LanguageLanguageTrait;
    use StringTypeTrait;

    /**
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "subtitles";

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
    public static function enumType(): array {
        return [
            self::TYPE_DEAF_SIGNED,
            self::TYPE_ONSCREEN,
            self::TYPE_TELETEXT,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeSubtitles($this);
    }

    /**
     * Set the type.
     *
     * @param string|null $type The type.
     * @return Subtitles Returns this subtitles.
     * @throws InvalidArgumentException Throws an invalid argument exception if the type is invalid.
     */
    public function setType(?string $type): Subtitles {
        if (null !== $type && false === in_array($type, static::enumType())) {
            throw new InvalidArgumentException(sprintf('The type "%s" is invalid', $type));
        }
        $this->type = $type;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeSubtitles($this);
    }
}
