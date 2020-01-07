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

use WBW\Library\XMLTV\Model\Actor;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestArrayActorsTrait;

/**
 * Array actors trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class ArrayActorsTraitTest extends AbstractTestCase {

    /**
     * Tests the addActor() method.
     *
     * @return void
     */
    public function testAddActor() {

        // Set an Actor mock.
        $actor = new Actor();

        $obj = new TestArrayActorsTrait();

        $obj->addActor($actor);
        $this->assertCount(1, $obj->getActors());
        $this->assertSame($actor, $obj->getActors()[0]);
        $this->assertTrue($obj->hasActors());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestArrayActorsTrait();

        $this->assertEquals([], $obj->getActors());
        $this->assertFalse($obj->hasActors());
    }
}
