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

use WBW\Library\XmlTv\Model\Writer;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestArrayWritersTrait;

/**
 * Array writers trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class ArrayWritersTraitTest extends AbstractTestCase {

    /**
     * Tests addWriter()
     *
     * @return void
     */
    public function testAddWriter(): void {

        // Set a Writer mock.
        $writer = new Writer();

        $obj = new TestArrayWritersTrait();

        $obj->addWriter($writer);
        $this->assertSame($writer, $obj->getWriters()[0]);
        $this->assertEquals(1, $obj->getNumberWriters());
        $this->assertTrue($obj->hasWriters());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayWritersTrait();

        $this->assertEquals([], $obj->getWriters());
        $this->assertEquals(0, $obj->getNumberWriters());
        $this->assertFalse($obj->hasWriters());
    }
}
