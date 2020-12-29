<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Model\Attribute;

use WBW\Library\XMLTV\Model\Commentator;

/**
 * Array commentators trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayCommentatorsTrait {

    /**
     * Commentators.
     *
     * @var Commentator[]
     */
    private $commentators;

    /**
     * Add a commentator.
     *
     * @param Commentator $commentator The commentator.
     */
    public function addCommentator(Commentator $commentator) {
        $this->commentators[] = $commentator;
        return $this;
    }

    /**
     * Get the commentators.
     *
     * @return Commentator[] Returns the commentators.
     */
    public function getCommentators(): array {
        return $this->commentators;
    }

    /**
     * Get the number of commentators.
     *
     * @return int Returns the number of commentators.
     */
    public function getNumberCommentators(): int {
        return count($this->getCommentators());
    }

    /**
     * Determines if this instance has commentators.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasCommentators(): bool {
        return 1 <= $this->getNumberCommentators();
    }

    /**
     * Set the commentators.
     *
     * @param Commentator[] $commentators The commentators.
     */
    protected function setCommentators(array $commentators) {
        $this->commentators = $commentators;
        return $this;
    }
}
