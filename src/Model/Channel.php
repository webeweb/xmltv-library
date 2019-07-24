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

use WBW\Library\XMLTV\Traits\IconsTrait;
use WBW\Library\XMLTV\Traits\UrlsTrait;

/**
 * Channel.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Channel extends AbstractModel {

    use IconsTrait;
    use UrlsTrait;

    /**
     * Display name.
     *
     * @var DisplayName[]
     */
    private $displayNames;

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
        $this->setDisplayNames([]);
        $this->setIcons([]);
        $this->setUrls([]);
    }

    /**
     * Add a display name.
     *
     * @param DisplayName $displayName The display name.
     * @return Channel Returns this channel.
     */
    public function addDisplayName(DisplayName $displayName) {
        $this->displayNames[] = $displayName;
        return $this;
    }

    /**
     * Get the display names.
     *
     * @return DisplayName[] Returns the display names.
     */
    public function getDisplayNames() {
        return $this->displayNames;
    }

    /**
     * Get the icons.
     *
     * @return Icon[] Returns the icons.
     */
    public function getIcons() {
        return $this->icons;
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
     * Determines if this channel has display names.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasDisplayNames() {
        return 1 <= count($this->displayNames);
    }

    /**
     * Set the display names.
     *
     * @param DisplayName[] $displayNames The display names.
     * @return Channel Returns this channel.
     */
    protected function setDisplayNames(array $displayNames) {
        $this->displayNames = $displayNames;
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
