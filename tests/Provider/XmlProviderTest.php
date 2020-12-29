<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Provider;

use Exception;
use Psr\Log\LoggerInterface;
use WBW\Library\XMLTV\Model\Channel;
use WBW\Library\XMLTV\Model\Programme;
use WBW\Library\XMLTV\Model\Tv;
use WBW\Library\XMLTV\Provider\XmlProvider;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * XML provider test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Provider
 */
class XmlProviderTest extends AbstractTestCase {

    /**
     * Input.
     *
     * @var string
     */
    private $input;

    /**
     * Output.
     *
     * @var string
     */
    private $output;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set an input mock.
        $this->input = getcwd() . "/XmlProvider.testGetXML.xml";

        // Set an output mock.
        $this->output = getcwd() . "/XmlProvider.testWriteXML.xml";

        $this->tearDown();
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown(): void {
        parent::tearDown();

        if (true === file_exists($this->input)) {
            unlink($this->input);
        }

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
    public function testGetXml(): void {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set an URL mock.
        $url = "https://raw.githubusercontent.com/webeweb/xmltv-library/master/tests/Fixtures/xmltv.xml";

        $res = XmlProvider::getXml($url, $this->input, $logger);
        $this->assertInstanceOf(Tv::class, $res);
    }

    /**
     * Tests the readXml() method.
     *
     * @return void
     */
    public function testReadXml(): void {

        $res = XmlProvider::readXml($this->filename);
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
    public function testStatXml(): void {

        $res = XmlProvider::statXml($this->filename);
        $this->assertCount(85, $res);
    }

    /**
     * Tests the writeXml() method.
     *
     * @return void
     */
    public function testWriteXml(): void {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Tv mock.
        $tv = XmlProvider::readXml($this->filename);

        XmlProvider::writeXml($tv, $this->output, $logger);
        $this->assertFileExists($this->output);

        $this->assertEquals(preg_replace("/\ {4}/", "  ", file_get_contents($this->filename)), file_get_contents($this->output));
    }
}