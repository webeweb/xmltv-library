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

use WBW\Library\XMLTV\Model\Adapter;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayAdaptersTrait;

/**
 * Array adapters trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayAdaptersTraitTest extends AbstractTestCase {

    /**
     * Tests the addAdapter() method.
     *
     * @return void
     */
    public function testAddAdapter(): void {

        // Set an Adapter mock.
        $adapter = new Adapter();

        $obj = new TestArrayAdaptersTrait();

        $obj->addAdapter($adapter);
        $this->assertSame($adapter, $obj->getAdapters()[0]);
        $this->assertEquals(1, $obj->getNumberAdapters());
        $this->assertTrue($obj->hasAdapters());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayAdaptersTrait();

        $this->assertEquals([], $obj->getAdapters());
        $this->assertEquals(0, $obj->getNumberAdapters());
        $this->assertFalse($obj->hasAdapters());
    }
}
