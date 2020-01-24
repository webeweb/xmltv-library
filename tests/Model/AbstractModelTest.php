<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Model;

use WBW\Library\XMLTV\Model\AbstractModel;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\TestCredit;

/**
 * Abstract model test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class AbstractModelTest extends AbstractTestCase {

    /**
     * Tests the serializeArray() method.
     *
     * @return void
     */
    public function testSerializeArray() {

        $model = new TestCredit();

        $res = AbstractModel::serializeArray([$model]);
        $this->assertCount(1, $res);

        $this->assertArrayHasKey("content", $res[0]);
    }

    /**
     * Tests the serializeModel() method.
     *
     * @return void
     */
    public function testSerializeModel() {

        $model = new TestCredit();

        $res = AbstractModel::serializeModel($model);
        $this->assertCount(1, $res);

        $this->assertArrayHasKey("content", $res);
    }
}
