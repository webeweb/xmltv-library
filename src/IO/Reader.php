<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\IO;

use DOMDocument;
use Exception;
use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
use WBW\Library\XMLTV\Model\Tv;
use WBW\Library\XMLTV\Serializer\XmlDeserializer;
use WBW\Library\XMLTV\Serializer\SerializerHelper;
use WBW\Library\XMLTV\Statistic\Statistic;
use WBW\Library\XMLTV\Statistic\Statistics;

/**
 * Reader.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\IO
 */
class Reader {

    /**
     * Get the DTD.
     *
     * @return string Returns the DTD.
     */
    public static function getDtd() {
        return realpath(__DIR__ . "/../Resources/dtd/xmltv.dtd");
    }

    /**
     * Get an XML file.
     *
     * @param string $url The URL.
     * @param string $filename The filename The filename.
     * @param LoggerInterface|null $logger The logger.
     * @return Tv Returns the TV.
     * @throws Exception Throws an exception if an error occurs.
     */
    public static function getXml($url, $filename, LoggerInterface $logger = null) {

        $stream = fopen($filename, "w");

        $client = new Client([
            "headers"     => [
                "Accept"     => "text/xml",
                "User-Agent" => "webeweb/xmltv-library",
            ],
            "save_to"     => $stream,
            "synchronous" => true,
        ]);

        $client->request("GET", $url);

        return static::readXml($filename, $logger);
    }

    /**
     * Read an XML file.
     *
     * @param string $filename The filename.
     * @param LoggerInterface $logger The logger.
     * @return Tv Returns the TV.
     */
    public static function readXml($filename, LoggerInterface $logger = null) {

        SerializerHelper::setLogger($logger);

        $document = new DOMDocument();
        $document->load($filename);
        if (false === @$document->schemaValidate(Reader::getDtd()) && null !== $logger) {
            $logger->warning("Schema validation failed", ["_filename" => $filename]);
        }

        return XmlDeserializer::deserializeTv($document->documentElement);
    }

    /**
     * Stat an XML file.
     *
     * @param string $filename The filename.
     * @return Statistic[] Returns the statistics.
     */
    public static function statXml($filename) {

        $document = new DOMDocument();
        $document->load($filename);

        $statistics = new Statistics();
        $statistics->parse($document->documentElement);

        return $statistics->getStatistics();
    }
}
