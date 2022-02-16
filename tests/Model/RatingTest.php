<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Model;

use WBW\Library\XmlTv\Model\Rating;
use WBW\Library\XmlTv\Tests\AbstractTestCase;

/**
 * Rating test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model
 */
class RatingTest extends AbstractTestCase {

    /**
     * Tests jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new Rating();
        $obj->setValue($this->value);
        $obj->addIcon($this->icon);

        $res = $obj->jsonSerialize();
        $this->assertCount(3, $res);

        $this->assertArrayHasKey("system", $res);
        $this->assertArrayHasKey("value", $res);
        $this->assertArrayHasKey("icons", $res);
    }

    /**
     * Tests setSystem()
     *
     * @return void
     */
    public function testSetSystem(): void {

        $obj = new Rating();

        $obj->setSystem("system");
        $this->assertEquals("system", $obj->getSystem());
    }

    /**
     * Tests xmlSerialize()
     *
     * @return void
     */
    public function testXmlSerialize(): void {

        $obj = new Rating();
        $obj->setValue($this->value);
        $obj->addIcon($this->icon);

        $res = '<rating><value></value><icon/></rating>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("rating", Rating::DOM_NODE_NAME);

        $obj = new Rating();

        $this->assertEquals([], $obj->getIcons());
        $this->assertNull($obj->getSystem());
        $this->assertNull($obj->getValue());
    }
}
