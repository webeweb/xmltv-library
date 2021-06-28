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

use WBW\Library\Traits\Strings\StringIdTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayDisplayNamesTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayIconsTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayProgrammesTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayUrlsTrait;
use WBW\Library\XMLTV\Serializer\JsonSerializer;
use WBW\Library\XMLTV\Serializer\XmlSerializer;

/**
 * Channel.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Channel extends AbstractModel {

    use ArrayDisplayNamesTrait;
    use ArrayIconsTrait;
    use ArrayProgrammesTrait;
    use ArrayUrlsTrait;
    use StringIdTrait;

    /**
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "channel";

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();

        $this->setDisplayNames([]);
        $this->setIcons([]);
        $this->setProgrammes([]);
        $this->setUrls([]);
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeChannel($this);
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeChannel($this);
    }
}
