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

use WBW\Library\XMLTV\Model\Credits;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Credits test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class CreditsTest extends AbstractTestCase {

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
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Credits();
        $obj->addActor($this->actor);
        $obj->addAdapter($this->adapter);
        $obj->addCommentator($this->commentator);
        $obj->addComposer($this->composer);
        $obj->addDirector($this->director);
        $obj->addEditor($this->editor);
        $obj->addGuest($this->guest);
        $obj->addPresenter($this->presenter);
        $obj->addProducer($this->producer);
        $obj->addWriter($this->writer);

        $res = $obj->jsonSerialize();
        $this->assertCount(10, $res);

        $this->assertArrayHasKey("actors", $res);
        $this->assertArrayHasKey("adapters", $res);
        $this->assertArrayHasKey("commentators", $res);
        $this->assertArrayHasKey("composers", $res);
        $this->assertArrayHasKey("directors", $res);
        $this->assertArrayHasKey("editors", $res);
        $this->assertArrayHasKey("guests", $res);
        $this->assertArrayHasKey("presenters", $res);
        $this->assertArrayHasKey("producers", $res);
        $this->assertArrayHasKey("writers", $res);
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Credits();
        $obj->addActor($this->actor);
        $obj->addAdapter($this->adapter);
        $obj->addCommentator($this->commentator);
        $obj->addComposer($this->composer);
        $obj->addDirector($this->director);
        $obj->addEditor($this->editor);
        $obj->addGuest($this->guest);
        $obj->addPresenter($this->presenter);
        $obj->addProducer($this->producer);
        $obj->addWriter($this->writer);

        $res = '<credits><director></director><actor></actor><writer></writer><adapter></adapter><producer></producer><composer></composer><editor></editor><presenter></presenter><commentator></commentator><guest></guest></credits>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }
}
