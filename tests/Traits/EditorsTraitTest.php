<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Traits;

use WBW\Library\XMLTV\Model\Editor;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestEditorsTrait;

/**
 * Editors trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class EditorsTraitTest extends AbstractTestCase {

    /**
     * Tests the addEditor() method.
     *
     * @return void
     */
    public function testAddEditor() {

        // Set an Editor mock.
        $editor = new Editor();

        $obj = new TestEditorsTrait();

        $obj->addEditor($editor);
        $this->assertCount(1, $obj->getEditors());
        $this->assertSame($editor, $obj->getEditors()[0]);
        $this->assertTrue($obj->hasEditors());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestEditorsTrait();

        $this->assertEquals([], $obj->getEditors());
        $this->assertFalse($obj->hasEditors());
    }
}
