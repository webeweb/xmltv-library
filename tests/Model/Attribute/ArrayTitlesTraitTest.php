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

use WBW\Library\XMLTV\Model\Title;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayTitlesTrait;

/**
 * Array titles trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayTitlesTraitTest extends AbstractTestCase {

    /**
     * Tests the addTitle() method.
     *
     * @return void
     */
    public function testAddTitle() {

        // Set a Title mock.
        $title = new Title();

        $obj = new TestArrayTitlesTrait();

        $obj->addTitle($title);
        $this->assertCount(1, $obj->getTitles());
        $this->assertSame($title, $obj->getTitles()[0]);
        $this->assertTrue($obj->hasTitles());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestArrayTitlesTrait();

        $this->assertEquals([], $obj->getTitles());
        $this->assertFalse($obj->hasTitles());
    }
}
