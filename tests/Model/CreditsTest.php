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
use WBW\Library\XMLTV\Model\Adapter;
use WBW\Library\XMLTV\Model\Commentator;
use WBW\Library\XMLTV\Model\Composer;
use WBW\Library\XMLTV\Model\Credits;
use WBW\Library\XMLTV\Model\Director;
use WBW\Library\XMLTV\Model\Editor;
use WBW\Library\XMLTV\Model\Guest;
use WBW\Library\XMLTV\Model\Presenter;
use WBW\Library\XMLTV\Model\Producer;
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
        $this->assertTrue($obj->hasActors());
    }

    /**
     * Tests the addAdapter() method.
     *
     * @return void
     */
    public function testAddAdapter() {

        // Set an Adapter mock.
        $adapter = new Adapter();

        $obj = new Credits();

        $obj->addAdapter($adapter);
        $this->assertCount(1, $obj->getAdapters());
        $this->assertSame($adapter, $obj->getAdapters()[0]);
        $this->assertTrue($obj->hasAdapters());
    }

    /**
     * Tests the addCommentator() method.
     *
     * @return void
     */
    public function testAddCommentator() {

        // Set an Commentator mock.
        $commentator = new Commentator();

        $obj = new Credits();

        $obj->addCommentator($commentator);
        $this->assertCount(1, $obj->getCommentators());
        $this->assertSame($commentator, $obj->getCommentators()[0]);
        $this->assertTrue($obj->hasCommentators());
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
        $this->assertTrue($obj->hasComposers());
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
        $this->assertTrue($obj->hasDirectors());
    }

    /**
     * Tests the addEditor() method.
     *
     * @return void
     */
    public function testAddEditor() {

        // Set an Editor mock.
        $editor = new Editor();

        $obj = new Credits();

        $obj->addEditor($editor);
        $this->assertCount(1, $obj->getEditors());
        $this->assertSame($editor, $obj->getEditors()[0]);
        $this->assertTrue($obj->hasEditors());
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
        $this->assertTrue($obj->hasGuests());
    }

    /**
     * Tests the addPresenter() method.
     *
     * @return void
     */
    public function testAddPresenter() {

        // Set an Presenter mock.
        $presenter = new Presenter();

        $obj = new Credits();

        $obj->addPresenter($presenter);
        $this->assertCount(1, $obj->getPresenters());
        $this->assertSame($presenter, $obj->getPresenters()[0]);
        $this->assertTrue($obj->hasPresenters());
    }

    /**
     * Tests the addProducer() method.
     *
     * @return void
     */
    public function testAddProducer() {

        // Set an Producer mock.
        $producer = new Producer();

        $obj = new Credits();

        $obj->addProducer($producer);
        $this->assertCount(1, $obj->getProducers());
        $this->assertSame($producer, $obj->getProducers()[0]);
        $this->assertTrue($obj->hasProducers());
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
        $this->assertTrue($obj->hasWriters());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Credits();

        $this->assertEquals([], $obj->getActors());
        $this->assertEquals([], $obj->getAdapters());
        $this->assertEquals([], $obj->getCommentators());
        $this->assertEquals([], $obj->getComposers());
        $this->assertEquals([], $obj->getDirectors());
        $this->assertEquals([], $obj->getEditors());
        $this->assertEquals([], $obj->getGuests());
        $this->assertEquals([], $obj->getPresenters());
        $this->assertEquals([], $obj->getProducers());
        $this->assertEquals([], $obj->getWriters());
        $this->assertFalse($obj->hasActors());
        $this->assertFalse($obj->hasAdapters());
        $this->assertFalse($obj->hasCommentators());
        $this->assertFalse($obj->hasComposers());
        $this->assertFalse($obj->hasDirectors());
        $this->assertFalse($obj->hasEditors());
        $this->assertFalse($obj->hasGuests());
        $this->assertFalse($obj->hasPresenters());
        $this->assertFalse($obj->hasProducers());
        $this->assertFalse($obj->hasWriters());
    }
}
