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
use WBW\Library\XMLTV\Model\Attribute\StringSystemTrait;
use WBW\Library\XMLTV\Serializer\JsonSerializer;
use WBW\Library\XMLTV\Serializer\XmlSerializer;

/**
 * Episode number.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class EpisodeNum extends AbstractModel {

    use StringContentTrait;
    use StringSystemTrait;

    /**
     * SYSTEM "onscreen".
     *
     * @var string
     */
    const SYSTEM_ONSCREEN = "onscreen";

    /**
     * System "deaf signed".
     *
     * @var string
     */
    const SYSTEM_XMLTV_NS = "xmltv_ns";

    /**
     * Enumerate the system.
     *
     * @return string[] Returns the system enumeration.
     */
    public static function enumSystem() {
        return [
            self::SYSTEM_ONSCREEN,
            self::SYSTEM_XMLTV_NS,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return JsonSerializer::serializeEpisodeNum($this);
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize() {
        return XmlSerializer::serializeEpisodeNum($this);
    }
}
