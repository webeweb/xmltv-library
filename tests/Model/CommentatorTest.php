<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Tests\Model;

use WBW\Library\XmlTv\Model\Commentator;
use WBW\Library\XmlTv\Tests\AbstractTestCase;

/**
 * Commentator test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Tests\Model
 */
class CommentatorTest extends AbstractTestCase {

    /**
     * Tests xmlSerialize()
     *
     * @return void
     */
    public function testXmlSerialize(): void {

        $obj = new Commentator();
        $obj->setContent("content");

        $res = '<commentator>content</commentator>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("commentator", Commentator::DOM_NODE_NAME);

        $obj = new Commentator();

        $this->assertNull($obj->getContent());
    }
}
