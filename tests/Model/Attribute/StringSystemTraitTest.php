<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Model\Attribute;

use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestStringSystemTrait;

/**
 * String system trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class StringSystemTraitTest extends AbstractTestCase {

    /**
     * Tests the setSystem() method.
     *
     * @return void
     */
    public function testSetSystem() {

        $obj = new TestStringSystemTrait();

        $obj->setSystem("system");
        $this->assertEquals("system", $obj->getSystem());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestStringSystemTrait();

        $this->assertNull($obj->getSystem());
    }
}
