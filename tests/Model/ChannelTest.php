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

use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Channel test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class ChannelTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Channel();

        $this->assertEquals([], $obj->getDisplayNames());
        $this->assertEquals([], $obj->getIcons());
        $this->assertNull($obj->getId());
        $this->assertEquals([], $obj->getProgrammes());
        $this->assertEquals([], $obj->getUrls());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Channel();
        $obj->setId("id");
        $obj->addDisplayName($this->displayName);
        $obj->addIcon($this->icon);
        $obj->addUrl($this->url);

        $res = $obj->jsonSerialize();
        $this->assertCount(4, $res);

        $this->assertArrayHasKey("displayNames", $res);
        $this->assertArrayHasKey("icons", $res);
        $this->assertArrayHasKey("id", $res);
        $this->assertArrayHasKey("urls", $res);
    }

    /**
     * Tests the setId() method.
     *
     * @return void
     */
    public function testSetId() {

        $obj = new Channel();

        $obj->setId("id");
        $this->assertEquals("id", $obj->getId());
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Channel();
        $obj->setId("id");
        $obj->addDisplayName($this->displayName);
        $obj->addIcon($this->icon);
        $obj->addUrl($this->url);

        $res = '<channel id="id"><display-name></display-name><icon/><url></url></channel>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }
}
