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

use WBW\Library\Traits\Strings\StringContentTrait;
use WBW\Library\XMLTV\Serializer\JsonSerializer;

/**
 * Abstract credit.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 * @abstract
 */
abstract class AbstractCredit extends AbstractModel {

    use StringContentTrait;

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeCredit($this);
    }
}
