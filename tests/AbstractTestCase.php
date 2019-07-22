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

use DOMDocument;
use PHPUnit\Framework\TestCase;

/**
 * Abstract test case.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests
 * @abstract
 */
abstract class AbstractTestCase extends TestCase {

    /**
     * Document
     *
     * @var DOMDocument
     */
    protected $document;

    /**
     * {@inheritDoc}
     */
    protected function setUp() {
        parent::setUp();

        $filename = getcwd() . "/tests/Fixtures/xmltv.xml";

        // Set a DOM document mock.
        $this->document = DOMDocument::load($filename);
    }
}
