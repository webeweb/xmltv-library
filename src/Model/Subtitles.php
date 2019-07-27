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
use WBW\Library\XMLTV\Traits\LanguageTrait;
use WBW\Library\XMLTV\Traits\TypeTrait;

/**
 * Subtitles.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Subtitles extends AbstractModel {

    use LanguageTrait;
    use TypeTrait;

    /**
     * Set the type.
     *
     * @param string $type The type.
     * @return Subtitles Returns this subtitles.
     */
    public function setType($type) {
        if (null !== $type && false === in_array($type, ["deaf-signed", "onscreen", "teletext"])) {
            throw new InvalidArgumentException(sprintf("The type \"%s\" is invalid", $type));
        }
        $this->type = $type;
        return $this;
    }
}
