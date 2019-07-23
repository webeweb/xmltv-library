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
     * @var DisplayName[]
     */
    private $displayNames;

    /**
     * Icons.
     *
     * @var Icon[]
     */
    private $icons;

    /**
     * Id.
     *
     * @var string
     */
    private $id;

    /**
     * URLs.
     *
     * @var Url[]
     */
    private $urls;

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
     * Add an icon.
     *
     * @param Icon $icon The icon.
     * @return Channel Returns this channel.
     */
    public function addIcon(Icon $icon) {
        $this->icons[] = $icon;
        return $this;
    }

    /**
     * Add an URL.
     *
     * @param Url $url The URL.
     * @return Channel Returns this channel.
     */
    public function addUrl(Url $url) {
        $this->urls[] = $url;
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
     * Get the urls.
     *
     * @return Url[] Returns the urls.
     */
    public function getUrls() {
        return $this->urls;
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
     * Determines if this channel has icons.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasIcons() {
        return 1 <= count($this->icons);
    }

    /**
     * Determines if this channel has URLs.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasURLs() {
        return 1 <= count($this->urls);
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
     * Set the icons.
     *
     * @param Icon[] $icons The icons.
     * @return Channel Returns this channel.
     */
    protected function setIcons(array $icons) {
        $this->icons = $icons;
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

    /**
     * Set the URLs.
     *
     * @param Url[] $urls The URLs.
     * @return Channel Returns this channel.
     */
    protected function setUrls(array $urls) {
        $this->urls = $urls;
        return $this;
    }
}
