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

use WBW\Library\XmlTv\Model\Present;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestPresentPresentTrait;

/**
 * Present present trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class PresentPresentTraitTest extends AbstractTestCase {

    /**
     * Tests setPresent()
     *
     * @return void
     */
    public function testSetPresent(): void {

        // Set a Present mock.
        $present = new Present();

        $obj = new TestPresentPresentTrait();

        $obj->setPresent($present);
        $this->assertSame($present, $obj->getPresent());
    }
}
