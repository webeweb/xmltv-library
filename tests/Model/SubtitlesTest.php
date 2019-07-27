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

use Exception;
use InvalidArgumentException;
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
     * Tests the setType() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSetType() {

        $obj = new Subtitles();

        $obj->setType("deaf-signed");
        $this->assertEquals("deaf-signed", $obj->getType());
    }

    /**
     * Tests the setType() method.
     *
     * @return void
     */
    public function testSetTypeWithInvaliArgumentException() {

        $obj = new Subtitles();

        try {

            $obj->setType("type");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The type \"type\" is invalid", $ex->getMessage());
        }
    }
}
