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

use WBW\Library\XMLTV\Model\Keyword;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayKeywordsTrait;

/**
 * Array keywords trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayKeywordsTraitTest extends AbstractTestCase {

    /**
     * Tests the addKeyword() method.
     *
     * @return void
     */
    public function testAddKeyword() {

        // Set a Keyword mock.
        $keyword = new Keyword();

        $obj = new TestArrayKeywordsTrait();

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

        $obj = new TestArrayKeywordsTrait();

        $this->assertEquals([], $obj->getKeywords());
        $this->assertFalse($obj->hasKeywords());
    }
}