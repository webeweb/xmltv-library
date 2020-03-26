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

use WBW\Library\XMLTV\Model\Editor;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayEditorsTrait;

/**
 * Array editors trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayEditorsTraitTest extends AbstractTestCase {

    /**
     * Tests the addEditor() method.
     *
     * @return void
     */
    public function testAddEditor() {

        // Set an Editor mock.
        $editor = new Editor();

        $obj = new TestArrayEditorsTrait();

        $obj->addEditor($editor);
        $this->assertSame($editor, $obj->getEditors()[0]);
        $this->assertEquals(1, $obj->getNumberEditors());
        $this->assertTrue($obj->hasEditors());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestArrayEditorsTrait();

        $this->assertEquals([], $obj->getEditors());
        $this->assertEquals(0, $obj->getNumberEditors());
        $this->assertFalse($obj->hasEditors());
    }
}
