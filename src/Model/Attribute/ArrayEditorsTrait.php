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

use WBW\Library\XMLTV\Model\Editor;

/**
 * Array editors trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model\Attribute
 */
trait ArrayEditorsTrait {

    /**
     * Editors.
     *
     * @var Editor[]
     */
    private $editors;

    /**
     * Add an editor.
     *
     * @param Editor $editor The editor.
     */
    public function addEditor(Editor $editor) {
        $this->editors[] = $editor;
        return $this;
    }

    /**
     * Get the editors.
     *
     * @return Editor[] Returns the editors.
     */
    public function getEditors(): array {
        return $this->editors;
    }

    /**
     * Get the number of editors.
     *
     * @return int Returns the number of editors.
     */
    public function getNumberEditors(): int {
        return count($this->getEditors());
    }

    /**
     * Determines if this instance has editors.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasEditors(): bool {
        return 1 <= $this->getNumberEditors();
    }

    /**
     * Set the editors.
     *
     * @param Editor[] $editors The editors.
     */
    protected function setEditors(array $editors) {
        $this->editors = $editors;
        return $this;
    }
}
