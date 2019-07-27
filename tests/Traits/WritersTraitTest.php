<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Traits;

use WBW\Library\XMLTV\Model\Writer;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestWritersTrait;

/**
 * Writers trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class WritersTraitTest extends AbstractTestCase {

    /**
     * Tests the addWriter() method.
     *
     * @return void
     */
    public function testAddWriter() {

        // Set an Writer mock.
        $writer = new Writer();

        $obj = new TestWritersTrait();

        $obj->addWriter($writer);
        $this->assertCount(1, $obj->getWriters());
        $this->assertSame($writer, $obj->getWriters()[0]);
        $this->assertTrue($obj->hasWriters());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestWritersTrait();

        $this->assertEquals([], $obj->getWriters());
        $this->assertFalse($obj->hasWriters());
    }
}
