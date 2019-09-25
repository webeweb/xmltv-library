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

/**
 * Statistic.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Statistic
 */
class Statistic {

    /**
     * Content format
     *
     * @var string
     */
    const CONTENT_FORMAT = " %-' 16s   %-' 19s   % 6d   % 6d   % 6d   %' 9.2f";

    /**
     * Header format.
     *
     * @var string
     */
    const HEADER_FORMAT = "------------------ --------------------- -------- -------- -------- -----------";

    /**
     * Titles format.
     *
     * @var string
     */
    const TITLES_FORMAT = " Node               Attribute             Count    Min      Max      Avg";

    /**
     * Attribute name.
     *
     * @var string
     */
    private $attrName;

    /**
     * Average.
     *
     * @var float
     */
    private $avg;

    /**
     * Count.
     *
     * @var int
     */
    private $count;

    /**
     * Max.
     *
     * @var int
     */
    private $max;

    /**
     * Min.
     *
     * @var int
     */
    private $min;

    /**
     * Node name.
     *
     * @var string
     */
    private $nodeName;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setAvg(0.0);
        $this->setCount(0);
        $this->setMax(0);
    }

    /**
     * Convert this statistic into a string representation.
     *
     * @return string Returns a string representation of this statistic.
     */
    public function __toString() {

        $args = [
            $this->getNodeName(),
            $this->getAttrName(),
            $this->getCount(),
            $this->getMin(),
            $this->getMax(),
            $this->getAvg(),
        ];

        return vsprintf(self::CONTENT_FORMAT, $args);
    }

    /**
     * Add.
     *
     * @param string $str The string.
     * @return Statistic Returns this statistic.
     */
    public function add($str) {

        ++$this->count;

        $len = strlen($str);

        if ($len < $this->getMin() || null === $this->getMin()) {
            $this->setMin($len);
        }

        if ($this->getMax() < $len) {
            $this->setMax($len);
        }

        if (1 === $this->getCount()) {
            $this->setAvg($len);
            return $this;
        }

        $avg = ($this->getAvg() + $len) / 2;
        $this->setAvg($avg);

        return $this;
    }

    /**
     * Get the attribute name.
     *
     * @return string Returns the attribute name.
     */
    public function getAttrName() {
        return $this->attrName;
    }

    /**
     * Get the average.
     *
     * @return float Returns the average.
     */
    public function getAvg() {
        return $this->avg;
    }

    /**
     * Get the count.
     *
     * @return int Returns the count.
     */
    public function getCount() {
        return $this->count;
    }

    /**
     * Get the max.
     *
     * @return int Returns the max.
     */
    public function getMax() {
        return $this->max;
    }

    /**
     * Get the min.
     *
     * @return int Returns the min.
     */
    public function getMin() {
        return $this->min;
    }

    /**
     * Get the node name.
     *
     * @return string Returns the node name.
     */
    public function getNodeName() {
        return $this->nodeName;
    }

    /**
     * Set the attribute name.
     *
     * @param string $attrName The attribute name.
     * @return Statistic Returns this statistic.
     */
    public function setAttrName($attrName) {
        $this->attrName = $attrName;
        return $this;
    }

    /**
     * Set the average.
     *
     * @param float $avg The average.
     * @return Statistic Returns this statistic.
     */
    public function setAvg($avg) {
        $this->avg = $avg;
        return $this;
    }

    /**
     * Set the count.
     *
     * @param int $count The count.
     * @return Statistic Returns this statistic.
     */
    public function setCount($count) {
        $this->count = $count;
        return $this;
    }

    /**
     * Set the max.
     *
     * @param int $max The max.
     * @return Statistic Returns this statistic.
     */
    public function setMax($max) {
        $this->max = $max;
        return $this;
    }

    /**
     * Set the min.
     *
     * @param int $min The min.
     * @return Statistic Returns this statistic.
     */
    public function setMin($min) {
        $this->min = $min;
        return $this;
    }

    /**
     * Set the node name.
     *
     * @param string $nodeName The node name.
     * @return Statistic Returns this statistic.
     */
    public function setNodeName($nodeName) {
        $this->nodeName = $nodeName;
        return $this;
    }
}
