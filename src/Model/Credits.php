<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XmlTv\Model;

use WBW\Library\XmlTv\Model\Attribute\ArrayActorsTrait;
use WBW\Library\XmlTv\Model\Attribute\ArrayAdaptersTrait;
use WBW\Library\XmlTv\Model\Attribute\ArrayCommentatorsTrait;
use WBW\Library\XmlTv\Model\Attribute\ArrayComposersTrait;
use WBW\Library\XmlTv\Model\Attribute\ArrayDirectorsTrait;
use WBW\Library\XmlTv\Model\Attribute\ArrayEditorsTrait;
use WBW\Library\XmlTv\Model\Attribute\ArrayGuestsTrait;
use WBW\Library\XmlTv\Model\Attribute\ArrayPresentersTrait;
use WBW\Library\XmlTv\Model\Attribute\ArrayProducersTrait;
use WBW\Library\XmlTv\Model\Attribute\ArrayWritersTrait;
use WBW\Library\XmlTv\Serializer\JsonSerializer;
use WBW\Library\XmlTv\Serializer\XmlSerializer;

/**
 * Credits.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\XmlTv\Model
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
     * {@inheritdoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeCredits($this);
    }

    /**
     * {@inheritdoc}
     */
    public function xmlSerialize(): string {
        return XmlSerializer::serializeCredits($this);
    }
}
