<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Provider;

use DOMDocument;
use Exception;
use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
use RuntimeException;
use WBW\Library\XMLTV\Model\Tv;
use WBW\Library\XMLTV\Serializer\SerializerHelper;
use WBW\Library\XMLTV\Serializer\XmlDeserializer;
use WBW\Library\XMLTV\Statistic\Statistic;
use WBW\Library\XMLTV\Statistic\Statistics;

/**
 * XML provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Provider
 */
class XmlProvider {

    /**
     * Get the DTD.
     *
     * @return string Returns the DTD.
     */
    public static function getDtd(): string {
        return realpath(__DIR__ . "/../Resources/config/xmltv.dtd");
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
    public static function getXml(string $url, string $filename, LoggerInterface $logger = null): Tv {

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
     * @param LoggerInterface|null $logger The logger.
     * @return Tv Returns the TV.
     * @throws RuntimeException Throws a runtime exception if an error occurs.
     */
    public static function readXml(string $filename, LoggerInterface $logger = null): Tv {

        SerializerHelper::setLogger($logger);

        $document = new DOMDocument();
        if (false === @$document->load($filename)) {
            throw new RuntimeException(libxml_get_last_error()->message, 500);
        }
        if (false === @$document->schemaValidate(static::getDtd()) && null !== $logger) {
            $logger->warning("Schema validation failed", ["_filename" => $filename]);
        }

        return XmlDeserializer::deserializeTv($document->documentElement);
    }

    /**
     * Stat an XML file.
     *
     * @param string $filename The filename.
     * @return Statistic[] Returns the statistics.
     * @throws RuntimeException Throws a runtime exception if an error occurs.
     */
    public static function statXml(string $filename): array {

        $document = new DOMDocument();
        if (false === @$document->load($filename)) {
            throw new RuntimeException(libxml_get_last_error()->message, 500);
        }

        $statistics = new Statistics();
        $statistics->parse($document->documentElement);

        return $statistics->getStatistics();
    }

    /**
     * Write an XML file.
     *
     * @param Tv $tv The TV.
     * @param string $filename The filename.
     * @param LoggerInterface|null $logger The logger.
     * @return int Returns the number of bytes written.
     */
    public static function writeXml(Tv $tv, string $filename, LoggerInterface $logger = null): int {

        $xml = [
            '<?xml version="1.0" encoding="utf-8"?>',
            '<!DOCTYPE tv SYSTEM "xmltv.dtd">',
            $tv->xmlSerialize(),
        ];

        $document = new DOMDocument();
        $document->loadXML(implode("", $xml));
        if (false === @$document->schemaValidate(static::getDtd()) && null !== $logger) {
            $logger->warning("Schema validation failed");
        }

        $document->formatOutput = true;

        return $document->save($filename);
    }
}