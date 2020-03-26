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

use WBW\Library\XMLTV\Model\Category;

/**
 * Array categories trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayCategoriesTrait {

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
     * Get the number of categories.
     *
     * @return int Returns the number of categories.
     */
    public function getNumberCategories() {
        return count($this->getCategories());
    }

    /**
     * Determines if this programme has categories.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasCategories() {
        return 1 <= $this->getNumberCategories();
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
