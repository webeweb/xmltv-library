<?php

/*
 * Disclaimer: This source code is protected by copyright law and by
 * international conventions.
 *
 * Any reproduction or partial or total distribution of the source code, by any
 * means whatsoever, is strictly forbidden.
 *
 * Anyone not complying with these provisions will be guilty of the offense of
 * infringement and the penal sanctions provided for by law.
 *
 * (c) 2019 All rights reserved.
 */

declare(strict_types = 1);

namespace WBW\Library\XmlTv\Model;

use JsonSerializable;
use WBW\Library\Common\Serializer\XmlSerializable;

/**
 * Abstract model.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Model
 * @abstract
 */
abstract class AbstractModel implements JsonSerializable, XmlSerializable {

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO
    }
}
