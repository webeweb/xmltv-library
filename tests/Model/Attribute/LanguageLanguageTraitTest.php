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

use WBW\Library\XMLTV\Model\Language;
use WBW\Library\XMLTV\Tests\AbstractTestCase;
use WBW\Library\XMLTV\Tests\Fixtures\Model\Attribute\TestLanguageLanguageTrait;

/**
 * Language language trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Model\Attribute
 */
class LanguageLanguageTraitTest extends AbstractTestCase {

    /**
     * Tests the setLanguage() method.
     *
     * @return void
     */
    public function testSetLanguage(): void {

        // Set a Language mock.
        $language = new Language();

        $obj = new TestLanguageLanguageTrait();

        $obj->setLanguage($language);
        $this->assertSame($language, $obj->getLanguage());
    }
}
