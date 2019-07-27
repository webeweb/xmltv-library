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

use WBW\Library\XMLTV\Model\Presenter;

/**
 * Presenters trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait PresentersTrait {

    /**
     * Presenters.
     *
     * @var Presenter[]
     */
    private $presenters;

    /**
     * Add an presenter.
     *
     * @param Presenter $presenter The presenter.
     */
    public function addPresenter(Presenter $presenter) {
        $this->presenters[] = $presenter;
        return $this;
    }

    /**
     * Get the presenters.
     *
     * @return Presenter[] Returns the presenters.
     */
    public function getPresenters() {
        return $this->presenters;
    }

    /**
     * Determines if this instance has presenters.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasPresenters() {
        return 1 <= count($this->presenters);
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
