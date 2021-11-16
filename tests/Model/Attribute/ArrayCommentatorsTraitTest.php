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

use WBW\Library\XmlTv\Model\Commentator;
use WBW\Library\XmlTv\Tests\AbstractTestCase;
use WBW\Library\XmlTv\Tests\Fixtures\Model\Attribute\TestArrayCommentatorsTrait;

/**
 * Array commentators trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XmlTv\Tests\Model\Attribute
 */
class ArrayCommentatorsTraitTest extends AbstractTestCase {

    /**
     * Tests the addCommentator() method.
     *
     * @return void
     */
    public function testAddCommentator(): void {

        // Set a Commentator mock.
        $commentator = new Commentator();

        $obj = new TestArrayCommentatorsTrait();

        $obj->addCommentator($commentator);
        $this->assertSame($commentator, $obj->getCommentators()[0]);
        $this->assertEquals(1, $obj->getNumberCommentators());
        $this->assertTrue($obj->hasCommentators());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestArrayCommentatorsTrait();

        $this->assertEquals([], $obj->getCommentators());
        $this->assertEquals(0, $obj->getNumberCommentators());
        $this->assertFalse($obj->hasCommentators());
    }
}
