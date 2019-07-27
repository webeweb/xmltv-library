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

use WBW\Library\XMLTV\Model\Category;

/**
 * Categories trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait CategoriesTrait {

    /**
     * Categories.
     *
     * @var Category[]
     */
    private $categories;

    /**
     * Add a category.
     *
     * @param Category $category The category.
     */
    public function addCategory(Category $category) {
        $this->categories[] = $category;
        return $this;
    }

    /**
     * Get the categories.
     *
     * @return Category[] Returns the categories.
     */
    public function getCategories() {
        return $this->categories;
    }

    /**
     * Determines if this programme has categories.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasCategories() {
        return 1 <= count($this->categories);
    }

    /**
     * Set the categories.
     *
     * @param Category[] $categories The categories.
     */
    protected function setCategories(array $categories) {
        $this->categories = $categories;
        return $this;
    }
}
