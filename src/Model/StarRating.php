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

use WBW\Library\XMLTV\Model\Attribute\ArrayIconsTrait;
use WBW\Library\XMLTV\Model\Attribute\ValueTrait;
use WBW\Library\XMLTV\Serializer\JsonSerializer;
use WBW\Library\XMLTV\Serializer\XmlSerializer;

/**
 * Star rating.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class StarRating extends AbstractModel {

    use ArrayIconsTrait;
    use ValueTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();

        $this->setIcons([]);
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return JsonSerializer::serializeStarRating($this);
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize() {
        return XmlSerializer::serializeStarRating($this);
    }
}
