<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\IO;

use WBW\Library\XMLTV\IO\Reader;
use WBW\Library\XMLTV\IO\Writer;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Writer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\IO
 */
class WriterTest extends AbstractTestCase {

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
        $this->output = getcwd() . "/WriterTest.testWriteXML.xml";

        if (true === file_exists($this->output)) {
            unlink($this->output);
        }
    }

    /**
     * Tests the writeXml() method.
     *
     * @return void
     */
    public function testWriteXml() {

        // Set a Tv mock.
        $tv = Reader::readXml($this->filename);

        Writer::writeXml($tv, $this->output);
        $this->assertFileExists($this->output);

        $this->assertEquals(preg_replace("/\ {4}/", "  ", file_get_contents($this->filename)), file_get_contents($this->output));
    }
}
