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

use WBW\Library\XMLTV\Model\Value;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestValueTrait;

/**
 * Value trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ValueTraitTest extends AbstractTestCase {

    /**
     * Tests the setValue() method.
     *
     * @return void
     */
    public function testSetValue(): void {

        // Set a Value mock.
        $value = new Value();

        $obj = new TestValueTrait();

        $obj->setValue($value);
        $this->assertSame($value, $obj->getValue());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestValueTrait();

        $this->assertNull($obj->getValue());
    }
}
