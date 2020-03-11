<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\IO;

use DOMDocument;
use WBW\Library\XMLTV\Model\Tv;

/**
 * Writer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\IO
 */
class Writer {

    /**
     * Write XML.
     *
     * @param Tv $tv The tv.
     * @param string $filename The filename.
     * @return int Returns the number of bytes written.
     */
    public static function writeXml(Tv $tv, $filename) {

        $xml = [
            '<?xml version="1.0" encoding="utf-8"?>',
            '<!DOCTYPE tv SYSTEM "xmltv.dtd">',
            $tv->xmlSerialize(),
        ];

        $document = new DOMDocument();
        $document->loadXML(implode("", $xml));
        @$document->schemaValidate(Reader::getDtd());

        $document->formatOutput = true;

        return $document->save($filename);
    }
}
