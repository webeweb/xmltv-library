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

use WBW\Library\XMLTV\Model\Composer;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestComposersTrait;

/**
 * Composers trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class ComposersTraitTest extends AbstractTestCase {

    /**
     * Tests the addComposer() method.
     *
     * @return void
     */
    public function testAddComposer() {

        // Set a Composer mock.
        $composer = new Composer();

        $obj = new TestComposersTrait();

        $obj->addComposer($composer);
        $this->assertCount(1, $obj->getComposers());
        $this->assertSame($composer, $obj->getComposers()[0]);
        $this->assertTrue($obj->hasComposers());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestComposersTrait();

        $this->assertEquals([], $obj->getComposers());
        $this->assertFalse($obj->hasComposers());
    }
}
