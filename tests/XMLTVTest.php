<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests;

use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Model\Programme;
use WBW\Library\XMLTV\Model\Tv;
use WBW\Library\XMLTV\XMLTV;

/**
 * XMLTV test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests
 */
class XMLTVTest extends AbstractTestCase {

    /**
     * Tests tha parseXML() method.
     *
     * @return void
     */
    public function testParseXML() {

        $res = XMLTV::parseXML($this->filename);
        $this->assertInstanceOf(Tv::class, $res);

        $this->assertInstanceOf(Channel::class, $res->getChannels()[0]);
        $this->assertEquals("generator-info-name", $res->getGeneratorInfoName());
        $this->assertEquals("generator-info-url", $res->getGeneratorInfoURL());
        $this->assertInstanceOf(Programme::class, $res->getProgrammes()[0]);
        $this->assertEquals("source-data-url", $res->getSourceDataURL());
        $this->assertEquals("source-info-name", $res->getSourceInfoName());
        $this->assertEquals("source-info-url", $res->getSourceInfoURL());
    }
}
