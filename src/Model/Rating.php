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
use WBW\Library\XMLTV\Traits\SystemTrait;
use WBW\Library\XMLTV\Traits\ValueTrait;

/**
 * Rating.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Rating extends AbstractModel {

    use IconsTrait;
    use SystemTrait;
    use ValueTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setIcons([]);
    }
}
