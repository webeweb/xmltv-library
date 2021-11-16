<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Model\Attribute;

use WBW\Library\XmlTv\Model\Value;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestValueValueTrait;

/**
 * Value value trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class ValueValueTraitTest extends AbstractTestCase {

    /**
     * Tests the setValue() method.
     *
     * @return void
     */
    public function testSetValue(): void {

        // Set a Value mock.
        $value = new Value();

        $obj = new TestValueValueTrait();

        $obj->setValue($value);
        $this->assertSame($value, $obj->getValue());
    }
}
