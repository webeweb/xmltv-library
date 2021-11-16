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

use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestStringSystemTrait;

/**
 * String system trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class StringSystemTraitTest extends AbstractTestCase {

    /**
     * Tests the setSystem() method.
     *
     * @return void
     */
    public function testSetSystem(): void {

        $obj = new TestStringSystemTrait();

        $obj->setSystem("system");
        $this->assertEquals("system", $obj->getSystem());
    }
}
