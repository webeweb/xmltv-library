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

use WBW\Library\XMLTV\Model\Keyword;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Traits\TestKeywordsTrait;

/**
 * Keywords trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Traits
 */
class KeywordsTraitTest extends AbstractTestCase {

    /**
     * Tests the addKeyword() method.
     *
     * @return void
     */
    public function testAddKeyword() {

        // Set a Keyword mock.
        $keyword = new Keyword();

        $obj = new TestKeywordsTrait();

        $obj->addKeyword($keyword);
        $this->assertCount(1, $obj->getKeywords());
        $this->assertSame($keyword, $obj->getKeywords()[0]);
        $this->assertTrue($obj->hasKeywords());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestKeywordsTrait();

        $this->assertEquals([], $obj->getKeywords());
        $this->assertFalse($obj->hasKeywords());
    }
}
