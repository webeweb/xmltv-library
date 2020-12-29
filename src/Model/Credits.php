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

use WBW\Library\XMLTV\Model\Attribute\ArrayActorsTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayAdaptersTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayCommentatorsTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayComposersTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayDirectorsTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayEditorsTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayGuestsTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayPresentersTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayProducersTrait;
use WBW\Library\XMLTV\Model\Attribute\ArrayWritersTrait;
use WBW\Library\XMLTV\Serializer\JsonSerializer;
use WBW\Library\XMLTV\Serializer\XmlSerializer;

/**
 * Credits.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Credits extends AbstractModel {

    use ArrayActorsTrait;
    use ArrayAdaptersTrait;
    use ArrayCommentatorsTrait;
    use ArrayComposersTrait;
    use ArrayDirectorsTrait;
    use ArrayEditorsTrait;
    use ArrayGuestsTrait;
    use ArrayPresentersTrait;
    use ArrayProducersTrait;
    use ArrayWritersTrait;

    /**
     * DOM node name.
     *
     * @var string
     */
    const DOM_NODE_NAME = "credits";

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

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeCredits($this);
    }

    /**
     * {@inheritDoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeCredits($this);
    }
}
