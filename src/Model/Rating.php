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

use WBW\Library\XMLTV\Model\Attribute\ArrayIconsTrait;
use WBW\Library\XMLTV\Model\Attribute\StringSystemTrait;
use WBW\Library\XMLTV\Model\Attribute\ValueTrait;

/**
 * Rating.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Rating extends AbstractModel {

    use ArrayIconsTrait;
    use StringSystemTrait;
    use ValueTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setIcons([]);
    }
}
