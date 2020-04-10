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

use WBW\Library\XMLTV\Model\Producer;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayProducersTrait;

/**
 * Array producers trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayProducersTraitTest extends AbstractTestCase {

    /**
     * Tests the addProducer() method.
     *
     * @return void
     */
    public function testAddProducer() {

        // Set a Producer mock.
        $producer = new Producer();

        $obj = new TestArrayProducersTrait();

        $obj->addProducer($producer);
        $this->assertSame($producer, $obj->getProducers()[0]);
        $this->assertEquals(1, $obj->getNumberProducers());
        $this->assertTrue($obj->hasProducers());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestArrayProducersTrait();

        $this->assertEquals([], $obj->getProducers());
        $this->assertEquals(0, $obj->getNumberProducers());
        $this->assertFalse($obj->hasProducers());
    }
}
