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

use WBW\Library\XMLTV\Model\Present;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestPresentTrait;

/**
 * Present trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class PresentTraitTest extends AbstractTestCase {

    /**
     * Tests the setPresent() method.
     *
     * @return void
     */
    public function testSetPresent(): void {

        // Set a Present mock.
        $present = new Present();

        $obj = new TestPresentTrait();

        $obj->setPresent($present);
        $this->assertSame($present, $obj->getPresent());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestPresentTrait();

        $this->assertNull($obj->getPresent());
    }
}
