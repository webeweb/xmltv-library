<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Model\Attribute;

use DateTime;
use WBW\Library\XMLTV\Serializer\SerializerHelper;

/**
 * String start trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait StringStartTrait {

    /**
     * Start.
     *
     * @var string|null
     */
    protected $start;

    /**
     * Get the start.
     *
     * @return string|null Returns the start.
     */
    public function getStart(): ?string {
        return $this->start;
    }

    /**
     * Get the start into DateTime.
     *
     * @return DateTime|null Returns the start into DateTime in case of success, null otherwise.
     */
    public function getStartDateTime(): ?DateTime {
        return SerializerHelper::deserializeDateTime($this->start);
    }

    /**
     * Set the start.
     *
     * @param string|null $start The start.
     * @return self Returns this instance.
     */
    public function setStart(?string $start): self {
        $this->start = $start;
        return $this;
    }
}
