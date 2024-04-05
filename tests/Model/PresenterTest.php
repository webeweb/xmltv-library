<?php

declare(strict_types = 1);

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Model;

use WBW\Library\XmlTv\Model\Presenter;
use WBW\Library\XmlTv\Tests\AbstractTestCase;

/**
 * Presenter test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Model
 */
class PresenterTest extends AbstractTestCase {

    /**
     * Test xmlSerialize()
     *
     * @return void
     */
    public function testXmlSerialize(): void {

        $obj = new Presenter();
        $obj->setContent("content");

        $res = '<presenter>content</presenter>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("presenter", Presenter::DOM_NODE_NAME);

        $obj = new Presenter();

        $this->assertNull($obj->getContent());
    }
}
