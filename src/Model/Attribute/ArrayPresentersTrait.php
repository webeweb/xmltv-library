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

use WBW\Library\XMLTV\Model\Presenter;

/**
 * Array presenters trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayPresentersTrait {

    /**
     * Presenters.
     *
     * @var Presenter[]
     */
    private $presenters;

    /**
     * Add a presenter.
     *
     * @param Presenter $presenter The presenter.
     */
    public function addPresenter(Presenter $presenter) {
        $this->presenters[] = $presenter;
        return $this;
    }

    /**
     * Get the number of presenters.
     *
     * @return int Returns the number of presenters.
     */
    public function getNumberPresenters(): int {
        return count($this->getPresenters());
    }

    /**
     * Get the presenters.
     *
     * @return Presenter[] Returns the presenters.
     */
    public function getPresenters(): array {
        return $this->presenters;
    }

    /**
     * Determines if this instance has presenters.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasPresenters(): bool {
        return 1 <= $this->getNumberPresenters();
    }

    /**
     * Set the presenters.
     *
     * @param Presenter[] $presenters The presenters.
     */
    protected function setPresenters(array $presenters) {
        $this->presenters = $presenters;
        return $this;
    }
}
