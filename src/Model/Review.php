<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Model;

use InvalidArgumentException;
use WBW\Library\Core\Model\Attribute\StringLangTrait;
use WBW\Library\Core\Model\Attribute\StringTypeTrait;

/**
 * Review.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Review extends AbstractModel {

    use StringLangTrait;
    use StringTypeTrait;

    /**
     * Type "text".
     *
     * @var string
     */
    const TYPE_TEXT = "text";

    /**
     * Type "url".
     *
     * @var string
     */
    const TYPE_URL = "url";

    /**
     * Reviewer.
     *
     * @var string
     */
    private $reviewer;

    /**
     * Source.
     *
     * @var string
     */
    private $source;

    /**
     * Enumerate the type.
     *
     * @return string[] Returns the type enumeration.
     */
    public static function enumType() {
        return [
            self::TYPE_TEXT,
            self::TYPE_URL,
        ];
    }

    /**
     * Get the reviewer.
     *
     * @return string Returns the reviewer.
     */
    public function getReviewer() {
        return $this->reviewer;
    }

    /**
     * Get the source.
     *
     * @return string Returns the source.
     */
    public function getSource() {
        return $this->source;
    }

    /**
     * Set the reviewer.
     *
     * @param string $reviewer The reviewer.
     * @return Review Returns this review.
     */
    public function setReviewer($reviewer) {
        $this->reviewer = $reviewer;
        return $this;
    }

    /**
     * Set the source.
     *
     * @param string $source The source.
     * @return Review Returns this review.
     */
    public function setSource($source) {
        $this->source = $source;
        return $this;
    }

    /**
     * Set the type.
     *
     * @param string $type The type.
     * @return Review Returns this review.
     * @throws InvalidArgumentException Throws an invalid argument exception if the type is invalid.
     */
    public function setType($type) {
        if (null !== $type && false === in_array($type, static::enumType())) {
            throw new InvalidArgumentException(sprintf("The type \"%s\" is invalid", $type));
        }
        $this->type = $type;
        return $this;
    }
}
