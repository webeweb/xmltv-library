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

use WBW\Library\XMLTV\Serializer\JsonSerializer;
use WBW\Library\XMLTV\Serializer\XmlSerializer;

/**
 * Actor.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Actor extends AbstractCredit {

    /**
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "actor";

    /**
     * Role.
     *
     * @var string|null
     */
    private $role;

    /**
     * Get the role.
     *
     * @return string|null Returns the role.
     */
    public function getRole(): ?string {
        return $this->role;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeActor($this);
    }

    /**
     * Set the role.
     *
     * @param string|null $role The role.
     * @return Actor Returns this actor.
     */
    public function setRole(?string $role): Actor {
        $this->role = $role;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeActor($this);
    }
}
