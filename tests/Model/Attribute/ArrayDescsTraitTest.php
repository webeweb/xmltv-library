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

use WBW\Library\XMLTV\Model\Desc;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayDescsTrait;

/**
 * Array descriptions trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayDescsTraitTest extends AbstractTestCase {

    /**
     * Tests the addDesc() method.
     *
     * @return void
     */
    public function testAddDesc() {

        // Set a Desc mock.
        $desc = new Desc();

        $obj = new TestArrayDescsTrait();

        $obj->addDesc($desc);
        $this->assertCount(1, $obj->getDescs());
        $this->assertSame($desc, $obj->getDescs()[0]);
        $this->assertTrue($obj->hasDescs());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestArrayDescsTrait();

        $this->assertEquals([], $obj->getDescs());
        $this->assertFalse($obj->hasDescs());
    }
}
