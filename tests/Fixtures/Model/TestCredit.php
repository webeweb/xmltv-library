<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Fixtures\Model;

use WBW\Library\XMLTV\Model\AbstractCredit;

/**
 * Test credit.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Fixtures\Model
 */
class TestCredit extends AbstractCredit {

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return "";
    }
}
