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

use WBW\Library\XMLTV\Model\AbstractModel;

/**
 * Test model.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Fixtures\Model
 */
class TestModel extends AbstractModel {

    /**
     * {@inheritDoc}
     */
    public function getContent() {
        return parent::getContent();
    }

    /**
     * {@inheritDoc}
     */
    public function setContent($content) {
        return parent::setContent($content);
    }
}
