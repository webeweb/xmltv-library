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

use WBW\Library\XMLTV\Traits\ContentTrait;
use WBW\Library\XMLTV\Traits\LangTrait;

/**
 * Sub-title.
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class SubTitle extends AbstractModel {

    use ContentTrait;
    use LangTrait;
}
