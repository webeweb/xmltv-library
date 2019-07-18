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
use WBW\Library\XMLTV\Model\Stereo;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Audio test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class AudioTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Audio();

        $this->assertNull($obj->getStereo());
    }

    /**
     * Tests the setStereo() method.
     *
     * @return void
     */
    public function testSetStereo() {

        // Set a Stereo mock.
        $stereo = new Stereo();

        $obj = new Audio();

        $obj->setStereo($stereo);
        $this->assertSame($stereo, $obj->getStereo());
    }
}
