<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\IO;

use Exception;
use Psr\Log\LoggerInterface;
use WBW\Library\XMLTV\IO\Reader;
use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Model\Programme;
use WBW\Library\XMLTV\Model\Tv;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Reader test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\IO
 */
class ReaderTest extends AbstractTestCase {

    /**
     * Tests the loadXML() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testLoadXML() {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set an URL mock.
        $url = "https://raw.githubusercontent.com/webeweb/xmltv-library/master/tests/Fixtures/xmltv.xml";

        // Set a filename mock.
        $filename = getcwd() . "/xmltv.xml";

        $res = Reader::loadXML($url, $filename, $logger);
        $this->assertInstanceOf(Tv::class, $res);
    }

    /**
     * Tests the readXML() method.
     *
     * @return void
     */
    public function testReadXML() {

        $res = Reader::readXML($this->filename);
        $this->assertInstanceOf(Tv::class, $res);

        $this->assertInstanceOf(Channel::class, $res->getChannels()[0]);
        $this->assertEquals("generator-info-name", $res->getGeneratorInfoName());
        $this->assertEquals("generator-info-url", $res->getGeneratorInfoUrl());
        $this->assertInstanceOf(Programme::class, $res->getProgrammes()[0]);
        $this->assertEquals("source-data-url", $res->getSourceDataUrl());
        $this->assertEquals("source-info-name", $res->getSourceInfoName());
        $this->assertEquals("source-info-url", $res->getSourceInfoUrl());
    }

    /**
     * Tests the statXML() method.
     *
     * @return void
     */
    public function testStatXML() {

        $res = Reader::statXML($this->filename);
        $this->assertCount(85, $res);
    }
}
