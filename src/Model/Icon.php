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

use WBW\Library\Traits\Integers\IntegerHeightTrait;
use WBW\Library\Traits\Integers\IntegerWidthTrait;
use WBW\Library\XMLTV\Serializer\JsonSerializer;
use WBW\Library\XMLTV\Serializer\XmlSerializer;

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
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "icon";

    /**
     * Source.
     *
     * @var string|null
     */
    private $src;

    /**
     * Get the source.
     *
     * @return string|null Returns the source.
     */
    public function getSrc(): ?string {
        return $this->src;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeIcon($this);
    }

    /**
     * Set the source.
     *
     * @param string|null $src The source.
     * @return Icon Returns this icon.
     */
    public function setSrc(?string $src): Icon {
        $this->src = $src;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeIcon($this);
    }
}
