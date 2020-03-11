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

use WBW\Library\XMLTV\Model\Presenter;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Presenter test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class PresenterTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Presenter();

        $this->assertNull($obj->getContent());
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Presenter();
        $obj->setContent("content");

        $res = '<presenter>content</presenter>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

}
