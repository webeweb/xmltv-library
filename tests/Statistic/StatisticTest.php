<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Statistic;

use WBW\Library\XMLTV\Statistic\Statistic;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Statistic test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Statistic
 */
class StatisticTest extends AbstractTestCase {

    /**
     * Tests the add() method.
     *
     * @return void
     */
    public function testAdd() {

        $obj = new Statistic();

        $obj->add("0123456789");
        $this->assertEquals(1, $obj->getCount());
        $this->assertEquals(10, $obj->getMin());
        $this->assertEquals(10, $obj->getMax());
        $this->assertEquals(10, $obj->getAvg());

        $obj->add(null);
        $this->assertEquals(2, $obj->getCount());
        $this->assertEquals(0, $obj->getMin());
        $this->assertEquals(10, $obj->getMax());
        $this->assertEquals(5.0, $obj->getAvg());

        $obj->add("01234567890123456789");
        $this->assertEquals(3, $obj->getCount());
        $this->assertEquals(0, $obj->getMin());
        $this->assertEquals(20, $obj->getMax());
        $this->assertEquals(12.5, $obj->getAvg());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals(" %-' 16s   %-' 19s   % 6d   % 6d   % 6d   %' 9.2f", Statistic::CONTENT_FORMAT);
        $this->assertEquals("------------------ --------------------- -------- -------- -------- -----------", Statistic::HEADER_FORMAT);
        $this->assertEquals(" Node               Attribute             Count    Min      Max      Avg", Statistic::TITLES_FORMAT);

        $obj = new Statistic();

        $this->assertNull($obj->getAttrName());
        $this->assertEquals(0, $obj->getAvg());
        $this->assertEquals(0, $obj->getCount());
        $this->assertEquals(0, $obj->getMax());
        $this->assertNull($obj->getMin());
        $this->assertNull($obj->getNodeName());
    }

    /**
     * Tests the setAttrName() method.
     *
     * @return void
     */
    public function testSetAttrName() {

        $obj = new Statistic();

        $obj->setAttrName("attrName");
        $this->assertEquals("attrName", $obj->getAttrName());
    }

    /**
     * Tests the setAvg() method.
     *
     * @return void
     */
    public function testSetAvg() {

        $obj = new Statistic();

        $obj->setAvg(1.0);
        $this->assertEquals(1.0, $obj->getAvg());
    }

    /**
     * Tests the setCount() method.
     *
     * @return void
     */
    public function testSetCount() {

        $obj = new Statistic();

        $obj->setCount(100);
        $this->assertEquals(100, $obj->getCount());
    }

    /**
     * Tests the setMax() method.
     *
     * @return void
     */
    public function testSetMax() {

        $obj = new Statistic();

        $obj->setMax(2);
        $this->assertEquals(2, $obj->getMax());
    }

    /**
     * Tests the setMin() method.
     *
     * @return void
     */
    public function testSetMin() {

        $obj = new Statistic();

        $obj->setMin(1);
        $this->assertEquals(1, $obj->getMin());
    }

    /**
     * Tests the setNodeName() method.
     *
     * @return void
     */
    public function testSetNodeName() {

        $obj = new Statistic();

        $obj->setNodeName("nodeName");
        $this->assertEquals("nodeName", $obj->getNodeName());
    }

}
