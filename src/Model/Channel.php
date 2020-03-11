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

    /**
     * Id.
     *
     * @var string
     */
    private $id;

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
     * Get the id.
     *
     * @return string Returns the id.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return JsonSerializer::serializeChannel($this);
    }

    /**
     * Set the id.
     *
     * @param string $id The id.
     * @return Channel Returns this channel.
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize() {
        return XmlSerializer::serializeChannel($this);
    }
}
