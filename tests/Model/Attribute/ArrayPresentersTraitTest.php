<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Model\Attribute;

use WBW\Library\XMLTV\Model\Presenter;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayPresentersTrait;

/**
 * Array presenters trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayPresentersTraitTest extends AbstractTestCase {

    /**
     * Tests the addPresenter() method.
     *
     * @return void
     */
    public function testAddPresenter() {

        // Set a Presenter mock.
        $presenter = new Presenter();

        $obj = new TestArrayPresentersTrait();

        $obj->addPresenter($presenter);
        $this->assertCount(1, $obj->getPresenters());
        $this->assertSame($presenter, $obj->getPresenters()[0]);
        $this->assertTrue($obj->hasPresenters());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestArrayPresentersTrait();

        $this->assertEquals([], $obj->getPresenters());
        $this->assertFalse($obj->hasPresenters());
    }
}
