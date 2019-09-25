<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Statistic;

use DOMNode;

/**
 * Statistics.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Statistic
 */
class Statistics {

    /**
     * Statistics.
     *
     * @var Statistic[]
     */
    private $statistics;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setStatistics([]);
    }

    /**
     * Convert this statistics into a string representation.
     *
     * @return string Returns a string representation of this statistics.
     */
    public function __toString() {

        $strings = [
            Statistic::HEADER_FORMAT,
            Statistic::TITLES_FORMAT,
            Statistic::HEADER_FORMAT,
        ];

        foreach ($this->getStatistics() as $current) {
            $strings[] = $current->__toString();
        }

        $strings[] = Statistic::HEADER_FORMAT;

        return implode("\n", $strings);
    }

    /**
     * Get a statistic.
     *
     * @param string $key The key.
     * @return Statistic Returns the statistic.
     */
    protected function getStatistic($key) {
        if (false === array_key_exists($key, $this->statistics)) {
            $this->statistics[$key] = new Statistic();
        }
        return $this->statistics[$key];
    }

    /**
     * Get the statistics.
     *
     * @return Statistic[] Returns the statistics.
     */
    public function getStatistics() {
        return $this->statistics;
    }

    /**
     * Parse.
     *
     * @param DOMNode $domNode The DOM node.
     * @param DOMNode|null $parent The parent DOM node.
     * @return Statistics Returns this statistics.
     */
    public function parse(DOMNode $domNode, DOMNode $parent = null) {

        $key = null === $parent ? $domNode->nodeName : implode(">", [$parent->nodeName, $domNode->nodeName]);

        $statistic = $this->getStatistic($key);
        $statistic->add(trim($domNode->nodeValue));

        if (null === $parent) {
            $statistic->setNodeName($domNode->nodeName);
        } else {
            $statistic->setNodeName($parent->nodeName);
            $statistic->setAttrName($domNode->nodeName);
        }

        if (null !== $domNode->attributes) {

            /** @var DOMNode $current */
            foreach ($domNode->attributes as $current) {
                $this->parse($current, $domNode);
            }
        }

        if (null !== $domNode->childNodes) {

            /** @var DOMNode $current */
            foreach ($domNode->childNodes as $current) {
                $this->parse($current);
            }
        }

        return $this;
    }

    /**
     * Set the statistics.
     *
     * @param Statistic[] $statistics The statistics.
     * @return Statistics Returns this statistic.
     */
    protected function setStatistics(array $statistics) {
        $this->statistics = $statistics;
        return $this;
    }
}
