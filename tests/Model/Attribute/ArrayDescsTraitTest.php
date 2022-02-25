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

use WBW\Library\XmlTv\Model\Desc;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestArrayDescsTrait;

/**
 * Array descriptions trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class ArrayDescsTraitTest extends AbstractTestCase {

    /**
     * Tests addDesc()
     *
     * @return void
     */
    public function testAddDesc(): void {

        // Set a Desc mock.
        $desc = new Desc();

        $obj = new TestArrayDescsTrait();

        $obj->addDesc($desc);
        $this->assertSame($desc, $obj->getDescs()[0]);
        $this->assertEquals(1, $obj->getNumberDescs());
        $this->assertTrue($obj->hasDescs());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayDescsTrait();

        $this->assertEquals([], $obj->getDescs());
        $this->assertEquals(0, $obj->getNumberDescs());
        $this->assertFalse($obj->hasDescs());
    }
}
