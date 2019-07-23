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

use WBW\Library\XMLTV\Model\Present;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestPresentTrait;

/**
 * Present trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class PresentTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestPresentTrait();

        $this->assertNull($obj->getPresent());
    }

    /**
     * Tests the setPresent() method.
     *
     * @return void
     */
    public function testSetPresent() {

        // Set a Present mock.
        $present = new Present();

        $obj = new TestPresentTrait();

        $obj->setPresent($present);
        $this->assertSame($present, $obj->getPresent());
    }
}
