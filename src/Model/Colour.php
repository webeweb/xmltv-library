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

/**
 * Colour.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Colour extends AbstractModel {

    use StringContentTrait;

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return [
            "content" => $this->getContent(),
        ];
    }
}
