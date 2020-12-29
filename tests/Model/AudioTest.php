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

use WBW\Library\XMLTV\Model\Audio;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Audio test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class AudioTest extends AbstractTestCase {

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new Audio();
        $obj->setPresent($this->present);
        $obj->setStereo($this->stereo);

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("present", $res);
        $this->assertArrayHasKey("stereo", $res);
    }

    /**
     * Tests the setStereo() method.
     *
     * @return void
     */
    public function testSetStereo(): void {

        $obj = new Audio();

        $obj->setStereo($this->stereo);
        $this->assertSame($this->stereo, $obj->getStereo());
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize(): void {

        $obj = new Audio();
        $obj->setPresent($this->present);
        $obj->setStereo($this->stereo);

        $res = '<audio><present></present><stereo></stereo></audio>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("audio", Audio::DOM_NODE_NAME);

        $obj = new Audio();

        $this->assertNull($obj->getPresent());
        $this->assertNull($obj->getStereo());
    }
}
