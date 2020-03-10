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

use WBW\Library\XMLTV\Model\Commentator;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayCommentatorsTrait;

/**
 * Array commentators trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayCommentatorsTraitTest extends AbstractTestCase {

    /**
     * Tests the addCommentator() method.
     *
     * @return void
     */
    public function testAddCommentator() {

        // Set a Commentator mock.
        $commentator = new Commentator();

        $obj = new TestArrayCommentatorsTrait();

        $obj->addCommentator($commentator);
        $this->assertCount(1, $obj->getCommentators());
        $this->assertSame($commentator, $obj->getCommentators()[0]);
        $this->assertTrue($obj->hasCommentators());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestArrayCommentatorsTrait();

        $this->assertEquals([], $obj->getCommentators());
        $this->assertFalse($obj->hasCommentators());
    }
}