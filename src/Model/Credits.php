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

use WBW\Library\XMLTV\Traits\ActorsTrait;
use WBW\Library\XMLTV\Traits\AdaptersTrait;
use WBW\Library\XMLTV\Traits\CommentatorsTrait;
use WBW\Library\XMLTV\Traits\ComposersTrait;
use WBW\Library\XMLTV\Traits\DirectorsTrait;
use WBW\Library\XMLTV\Traits\EditorsTrait;
use WBW\Library\XMLTV\Traits\GuestsTrait;
use WBW\Library\XMLTV\Traits\PresentersTrait;
use WBW\Library\XMLTV\Traits\ProducersTrait;
use WBW\Library\XMLTV\Traits\WritersTrait;

/**
 * Credits.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Credits extends AbstractModel {

    use ActorsTrait;
    use AdaptersTrait;
    use CommentatorsTrait;
    use ComposersTrait;
    use DirectorsTrait;
    use EditorsTrait;
    use GuestsTrait;
    use PresentersTrait;
    use ProducersTrait;
    use WritersTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->setActors([]);
        $this->setAdapters([]);
        $this->setCommentators([]);
        $this->setComposers([]);
        $this->setDirectors([]);
        $this->setEditors([]);
        $this->setGuests([]);
        $this->setPresenters([]);
        $this->setProducers([]);
        $this->setWriters([]);
    }
}
