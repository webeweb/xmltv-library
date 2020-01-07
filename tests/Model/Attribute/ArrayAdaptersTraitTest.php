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
    public function testAddAdapter() {

        // Set an Adapter mock.
        $adapter = new Adapter();

        $obj = new TestArrayAdaptersTrait();

        $obj->addAdapter($adapter);
        $this->assertCount(1, $obj->getAdapters());
        $this->assertSame($adapter, $obj->getAdapters()[0]);
        $this->assertTrue($obj->hasAdapters());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestArrayAdaptersTrait();

        $this->assertEquals([], $obj->getAdapters());
        $this->assertFalse($obj->hasAdapters());
    }
}
