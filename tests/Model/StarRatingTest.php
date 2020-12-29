<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Model;

use WBW\Library\XMLTV\Model\StarRating;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Star rating test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class StarRatingTest extends AbstractTestCase {

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new StarRating();
        $obj->setValue($this->value);
        $obj->addIcon($this->icon);

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("value", $res);
        $this->assertArrayHasKey("icons", $res);
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize(): void {

        $obj = new StarRating();
        $obj->setValue($this->value);
        $obj->addIcon($this->icon);

        $res = '<star-rating><value></value><icon/></star-rating>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("star-rating", StarRating::DOM_NODE_NAME);

        $obj = new StarRating();

        $this->assertEquals([], $obj->getIcons());
        $this->assertNull($obj->getValue());
    }
}
