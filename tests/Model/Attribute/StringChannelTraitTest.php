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

use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestStringChannelTrait;

/**
 * String channel trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class StringChannelTraitTest extends AbstractTestCase {

    /**
     * Tests the setChannel() method.
     *
     * @return void
     */
    public function testSetChannel(): void {

        $obj = new TestStringChannelTrait();

        $obj->setChannel("channel");
        $this->assertEquals("channel", $obj->getChannel());
    }
}
