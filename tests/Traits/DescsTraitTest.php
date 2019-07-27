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

use WBW\Library\XMLTV\Model\Desc;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestDescsTrait;

/**
 * Descriptions trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class DescsTraitTest extends AbstractTestCase {

    /**
     * Tests the addDesc() method.
     *
     * @return void
     */
    public function testAddDesc() {

        // Set a Desc mock.
        $desc = new Desc();

        $obj = new TestDescsTrait();

        $obj->addDesc($desc);
        $this->assertCount(1, $obj->getDescs());
        $this->assertSame($desc, $obj->getDescs()[0]);
        $this->assertTrue($obj->hasDescs());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestDescsTrait();

        $this->assertEquals([], $obj->getDescs());
        $this->assertFalse($obj->hasDescs());
    }
}
