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

use WBW\Library\Core\Model\Attribute\IntegerHeightTrait;
use WBW\Library\Core\Model\Attribute\IntegerWidthTrait;

/**
 * Icon.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Icon extends AbstractModel {

    use IntegerHeightTrait;
    use IntegerWidthTrait;

    /**
     * Source.
     *
     * @var string
     */
    private $src;

    /**
     * Get the source.
     *
     * @return string Returns the source.
     */
    public function getSrc() {
        return $this->src;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return [
            "height" => $this->getHeight(),
            "src"    => $this->getSrc(),
            "width"  => $this->getWidth(),
        ];
    }

    /**
     * Set the source.
     *
     * @param string $src The source.
     * @return Icon Returns this icon.
     */
    public function setSrc($src) {
        $this->src = $src;
        return $this;
    }
}
