<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Parser;

use DOMDocument;
use WBW\Library\XMLTV\Model\Tv;

/**
 * Parser.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Parser
 */
class Parser {

    /**
     * Parses an XML.
     *
     * @param string $filename The filename.
     * @return Tv Returns the TV.
     */
    public static function parseXML($filename) {

        $document = new DOMDocument();
        $document->load($filename);

        return ParserHelper::parseTv($document->documentElement);
    }
}
