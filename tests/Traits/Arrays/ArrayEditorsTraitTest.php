<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Traits\Arrays;

use WBW\Library\XmlTv\Model\Editor;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Traits\Arrays\TestArrayEditorsTrait;

/**
 * Array editors trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Traits\Arrays
 */
class ArrayEditorsTraitTest extends AbstractTestCase {

    /**
     * Tests addEditor()
     *
     * @return void
     */
    public function testAddEditor(): void {

        // Set an Editor mock.
        $editor = new Editor();

        $obj = new TestArrayEditorsTrait();

        $obj->addEditor($editor);
        $this->assertSame($editor, $obj->getEditors()[0]);
        $this->assertEquals(1, $obj->getNumberEditors());
        $this->assertTrue($obj->hasEditors());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayEditorsTrait();

        $this->assertEquals([], $obj->getEditors());
        $this->assertEquals(0, $obj->getNumberEditors());
        $this->assertFalse($obj->hasEditors());
    }
}
