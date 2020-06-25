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

use Exception;
use InvalidArgumentException;
use WBW\Library\XMLTV\Model\Length;
use WBW\Library\XMLTV\Tests\AbstractTestCase;

/**
 * Length test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model
 */
class LengthTest extends AbstractTestCase {

    /**
     * Tests the enumUnits() method.
     *
     * @return void
     */
    public function testEnumUnits() {

        $res = [
            Length::UNITS_HOURS,
            Length::UNITS_MINUTES,
            Length::UNITS_SECONDS,
        ];
        $this->assertEquals($res, Length::enumUnits());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new Length();
        $obj->setContent("content");
        $obj->setUnits(Length::UNITS_HOURS);

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("units", $res);
        $this->assertArrayHasKey("content", $res);
    }

    /**
     * Tests the setUnits() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSetUnits() {

        $obj = new Length();

        $obj->setUnits("hours");
        $this->assertEquals("hours", $obj->getUnits());
    }

    /**
     * Tests the setUnits() method.
     *
     * @return void
     */
    public function testSetUnitsWithInvaliArgumentException() {

        $obj = new Length();

        try {

            $obj->setUnits("units");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The units "units" is invalid', $ex->getMessage());
        }
    }

    /**
     * Tests the xmlSerialize() method.
     *
     * @return void
     */
    public function testXmlSerialize() {

        $obj = new Length();
        $obj->setContent("content");
        $obj->setUnits(Length::UNITS_HOURS);

        $res = '<length units="hours">content</length>';
        $this->assertEquals($res, $obj->xmlSerialize());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("length", Length::DOM_NODE_NAME);
        $this->assertEquals("hours", Length::UNITS_HOURS);
        $this->assertEquals("minutes", Length::UNITS_MINUTES);
        $this->assertEquals("seconds", Length::UNITS_SECONDS);

        $obj = new Length();

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getUnits());
    }
}
