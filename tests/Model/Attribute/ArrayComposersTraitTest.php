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

use WBW\Library\XMLTV\Model\Composer;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayComposersTrait;

/**
 * Array composers trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayComposersTraitTest extends AbstractTestCase {

    /**
     * Tests the addComposer() method.
     *
     * @return void
     */
    public function testAddComposer(): void {

        // Set a Composer mock.
        $composer = new Composer();

        $obj = new TestArrayComposersTrait();

        $obj->addComposer($composer);
        $this->assertSame($composer, $obj->getComposers()[0]);
        $this->assertEquals(1, $obj->getNumberComposers());
        $this->assertTrue($obj->hasComposers());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayComposersTrait();

        $this->assertEquals([], $obj->getComposers());
        $this->assertEquals(0, $obj->getNumberComposers());
        $this->assertFalse($obj->hasComposers());
    }
}
