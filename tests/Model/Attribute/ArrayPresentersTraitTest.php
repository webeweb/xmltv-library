<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Model\Attribute;

use WBW\Library\XmlTv\Model\Presenter;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestArrayPresentersTrait;

/**
 * Array presenters trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class ArrayPresentersTraitTest extends AbstractTestCase {

    /**
     * Tests addPresenter()
     *
     * @return void
     */
    public function testAddPresenter(): void {

        // Set a Presenter mock.
        $presenter = new Presenter();

        $obj = new TestArrayPresentersTrait();

        $obj->addPresenter($presenter);
        $this->assertSame($presenter, $obj->getPresenters()[0]);
        $this->assertEquals(1, $obj->getNumberPresenters());
        $this->assertTrue($obj->hasPresenters());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayPresentersTrait();

        $this->assertEquals([], $obj->getPresenters());
        $this->assertEquals(0, $obj->getNumberPresenters());
        $this->assertFalse($obj->hasPresenters());
    }
}
