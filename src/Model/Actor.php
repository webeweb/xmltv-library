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

/**
 * Actor.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Actor extends AbstractCredit {

    /**
     * Role.
     *
     * @var string
     */
    private $role;

    /**
     * Get the role.
     *
     * @return string Returns the role.
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return JsonSerializer::serializeActor($this);
    }

    /**
     * Set the role.
     *
     * @param string $role The role.
     * @return Actor Returns this actor.
     */
    public function setRole($role) {
        $this->role = $role;
        return $this;
    }
}
