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

use WBW\Library\XMLTV\Traits\DisplayNamesTrait;
use WBW\Library\XMLTV\Traits\IconsTrait;
use WBW\Library\XMLTV\Traits\UrlsTrait;

/**
 * Channel.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Channel extends AbstractModel {

    use DisplayNamesTrait;
    use IconsTrait;
    use UrlsTrait;

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
     * Get the id.
     *
     * @return string Returns the id.
     */
    public function getId() {
        return $this->id;
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
