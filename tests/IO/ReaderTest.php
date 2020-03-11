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
     * Output.
     *
     * @var string
     */
    private $output;

    /**
     * {@inheritDoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set an Output mock.
        $this->output = getcwd() . "/ReaderTest.testGetXML.xml";

        if (true === file_exists($this->output)) {
            unlink($this->output);
        }
    }

    /**
     * Tests the getXml() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testGetXml() {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set an URL mock.
        $url = "https://raw.githubusercontent.com/webeweb/xmltv-library/master/tests/Fixtures/xmltv.xml";

        $res = Reader::getXml($url, $this->output, $logger);
        $this->assertInstanceOf(Tv::class, $res);
    }

    /**
     * Tests the readXml() method.
     *
     * @return void
     */
    public function testReadXml() {

        $res = Reader::readXml($this->filename);
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
     * Tests the statXml() method.
     *
     * @return void
     */
    public function testStatXml() {

        $res = Reader::statXml($this->filename);
        $this->assertCount(85, $res);
    }
}
