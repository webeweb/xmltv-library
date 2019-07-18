<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Model;

use WBW\Library\XMLTV\Model\Actor;
use WBW\Library\XMLTV\Model\Composer;
use WBW\Library\XMLTV\Model\Credits;
use WBW\Library\XMLTV\Model\Director;
use WBW\Library\XMLTV\Model\Guest;
use WBW\Library\XMLTV\Model\Writer;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Credits test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class CreditsTest extends AbstractTestCase {

    /**
     * Tests the addActor() method.
     *
     * @return void
     */
    public function testAddActor() {

        // Set an Actor mock.
        $actor = new Actor();

        $obj = new Credits();

        $obj->addActor($actor);
        $this->assertCount(1, $obj->getActors());
        $this->assertSame($actor, $obj->getActors()[0]);
    }

    /**
     * Tests the addComposer() method.
     *
     * @return void
     */
    public function testAddComposer() {

        // Set an Composer mock.
        $composer = new Composer();

        $obj = new Credits();

        $obj->addComposer($composer);
        $this->assertCount(1, $obj->getComposers());
        $this->assertSame($composer, $obj->getComposers()[0]);
    }

    /**
     * Tests the addDirector() method.
     *
     * @return void
     */
    public function testAddDirector() {

        // Set an Director mock.
        $director = new Director();

        $obj = new Credits();

        $obj->addDirector($director);
        $this->assertCount(1, $obj->getDirectors());
        $this->assertSame($director, $obj->getDirectors()[0]);
    }

    /**
     * Tests the addGuest() method.
     *
     * @return void
     */
    public function testAddGuest() {

        // Set an Guest mock.
        $guest = new Guest();

        $obj = new Credits();

        $obj->addGuest($guest);
        $this->assertCount(1, $obj->getGuests());
        $this->assertSame($guest, $obj->getGuests()[0]);
    }

    /**
     * Tests the addWriter() method.
     *
     * @return void
     */
    public function testAddWriter() {

        // Set an Writer mock.
        $writer = new Writer();

        $obj = new Credits();

        $obj->addWriter($writer);
        $this->assertCount(1, $obj->getWriters());
        $this->assertSame($writer, $obj->getWriters()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Credits();

        $this->assertEquals([], $obj->getActors());
        $this->assertEquals([], $obj->getComposers());
        $this->assertEquals([], $obj->getDirectors());
        $this->assertEquals([], $obj->getGuests());
        $this->assertEquals([], $obj->getWriters());
    }
}
