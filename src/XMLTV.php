<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV;

use DOMDocument;
use WBW\Library\XMLTV\Model\Tv;
use WBW\Library\XMLTV\Parser\Parser;

/**
 * XMLTV.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV
 */
class XMLTV {

    /**
     * Parses an XML file.
     *
     * @param string $filename The filename.
     * @return Tv Returns the TV.
     */
    public static function parseXML($filename) {

        $document = new DOMDocument();
        $document->load($filename);

        return Parser::parseTv($document->documentElement);
    }
}
