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

use WBW\Library\XMLTV\Model\Url;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestUrlsTrait;

/**
 * URLs trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class UrlsTraitTest extends AbstractTestCase {

    /**
     * Tests the addUrl() method.
     *
     * @return void
     */
    public function testAddUrl() {

        // Set an URL mock.
        $url = new Url();

        $obj = new TestUrlsTrait();

        $obj->addUrl($url);
        $this->assertCount(1, $obj->getUrls());
        $this->assertSame($url, $obj->getUrls()[0]);
        $this->assertTrue($obj->hasUrls());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestUrlsTrait();

        $this->assertEquals([], $obj->getUrls());
        $this->assertFalse($obj->hasUrls());
    }
}
