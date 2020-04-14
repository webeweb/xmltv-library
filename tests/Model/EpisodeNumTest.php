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

use WBW\Library\XMLTV\Model\EpisodeNum;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Episode number test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class EpisodeNumTest extends AbstractTestCase {

    /**
     * Tests the enumSystem() method.
     *
     * @return void
     */
    public function testEnumSystem() {

        $res = [
            EpisodeNum::SYSTEM_ONSCREEN,
            EpisodeNum::SYSTEM_XMLTV_NS,
        ];
        $this->assertEquals($res, EpisodeNum::enumSystem());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new EpisodeNum();
        $obj->setContent("content");
        $obj->setSystem(EpisodeNum::SYSTEM_ONSCREEN);

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("content", $res);
        $this->assertArrayHasKey("system", $res);
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new EpisodeNum();
        $obj->setContent("content");
        $obj->setSystem(EpisodeNum::SYSTEM_ONSCREEN);

        $res = '<episode-num system="onscreen">content</episode-num>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("episode-num", EpisodeNum::DOM_NODE_NAME);
        $this->assertEquals("onscreen", EpisodeNum::SYSTEM_ONSCREEN);
        $this->assertEquals("xmltv_ns", EpisodeNum::SYSTEM_XMLTV_NS);

        $obj = new EpisodeNum();

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getSystem());
    }
}
