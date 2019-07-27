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

use WBW\Library\XMLTV\Model\Editor;

/**
 * Editors trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Traits
 */
trait EditorsTrait {

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
     * @return EditorsTrait Returns this editors trait.
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
    public function getEditors() {
        return $this->editors;
    }

    /**
     * Determines if this instance has editors.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasEditors() {
        return 1 <= count($this->editors);
    }

    /**
     * Set the editors.
     *
     * @param Editor[] $editors The editors.
     * @return EditorsTrait Returns this editors trait.
     */
    protected function setEditors(array $editors) {
        $this->editors = $editors;
        return $this;
    }
}
