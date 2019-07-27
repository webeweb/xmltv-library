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

use WBW\Library\XMLTV\Model\Producer;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestProducersTrait;

/**
 * Producers trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class ProducersTraitTest extends AbstractTestCase {

    /**
     * Tests the addProducer() method.
     *
     * @return void
     */
    public function testAddProducer() {

        // Set an Producer mock.
        $producer = new Producer();

        $obj = new TestProducersTrait();

        $obj->addProducer($producer);
        $this->assertCount(1, $obj->getProducers());
        $this->assertSame($producer, $obj->getProducers()[0]);
        $this->assertTrue($obj->hasProducers());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestProducersTrait();

        $this->assertEquals([], $obj->getProducers());
        $this->assertFalse($obj->hasProducers());
    }
}