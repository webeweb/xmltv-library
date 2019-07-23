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

use WBW\Library\XMLTV\Model\Language;
use WBW\Library\XMLTV\Model\Subtitles;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Subtitles test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class SubtitlesTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Subtitles();

        $this->assertNull($obj->getLanguage());
        $this->assertNull($obj->getType());
    }

    /**
     * Tests the setLanguage() method.
     *
     * @return void
     */
    public function testSetLanguage() {

        // Set an Language mock.
        $category = new Language();

        $obj = new Subtitles();

        $obj->setLanguage($category);
        $this->assertSame($category, $obj->getLanguage());
    }
}
