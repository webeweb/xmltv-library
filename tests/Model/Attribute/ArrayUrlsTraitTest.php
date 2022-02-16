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

use WBW\Library\XmlTv\Model\Url;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestArrayUrlsTrait;

/**
 * Array URLs trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class ArrayUrlsTraitTest extends AbstractTestCase {

    /**
     * Tests addUrl()
     *
     * @return void
     */
    public function testAddUrl(): void {

        // Set an URL mock.
        $url = new Url();

        $obj = new TestArrayUrlsTrait();

        $obj->addUrl($url);
        $this->assertSame($url, $obj->getUrls()[0]);
        $this->assertEquals(1, $obj->getNumberUrls());
        $this->assertTrue($obj->hasUrls());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayUrlsTrait();

        $this->assertEquals([], $obj->getUrls());
        $this->assertEquals(0, $obj->getNumberUrls());
        $this->assertFalse($obj->hasUrls());
    }
}
