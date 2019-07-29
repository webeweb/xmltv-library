<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Traits;

use WBW\Library\XMLTV\Model\Commentator;

/**
 * Commentators trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait CommentatorsTrait {

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
    public function getCommentators() {
        return $this->commentators;
    }

    /**
     * Determines if this instance has commentators.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasCommentators() {
        return 1 <= count($this->commentators);
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
