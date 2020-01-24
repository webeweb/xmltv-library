<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Model;

use WBW\Library\XMLTV\Model\Premiere;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Premiere test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class PremiereTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Premiere();

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getLang());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Premiere();

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("content", $res);
        $this->assertArrayHasKey("lang", $res);
    }
}
