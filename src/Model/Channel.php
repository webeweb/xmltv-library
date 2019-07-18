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

/**
 * Channel.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Channel extends AbstractModel {

    /**
     * Display name.
     *
     * @var DisplayName
     */
    private $displayName;

    /**
     * Icon.
     *
     * @var Icon
     */
    private $icon;

    /**
     * Id.
     *
     * @var string
     */
    private $id;

    /**
     * Get the display name.
     *
     * @return DisplayName Returns the display name.
     */
    public function getDisplayName() {
        return $this->displayName;
    }

    /**
     * Get the icon.
     *
     * @return Icon Returns the icon.
     */
    public function getIcon() {
        return $this->icon;
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
     * Set the display name.
     *
     * @param DisplayName|null $displayName The display name.
     * @return Channel Returns this channel.
     */
    public function setDisplayName(DisplayName $displayName = null) {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * Set the icon.
     *
     * @param Icon|null $icon The icon.
     * @return Channel Returns this channel.
     */
    public function setIcon(Icon $icon = null) {
        $this->icon = $icon;
        return $this;
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
}
