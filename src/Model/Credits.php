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

/**
 * Credits.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 */
class Credits extends AbstractModel {

    /**
     * Actors.
     *
     * @var Actor[]
     */
    private $actors;

    /**
     * Adapters.
     *
     * @var Adapter[]
     */
    private $adapters;

    /**
     * Commentators.
     *
     * @var Commentator[]
     */
    private $commentators;

    /**
     * Composers.
     *
     * @var Composer[]
     */
    private $composers;

    /**
     * Directors.
     *
     * @var Director[]
     */
    private $directors;

    /**
     * Editors.
     *
     * @var Editor[]
     */
    private $editors;

    /**
     * Guests.
     *
     * @var Guest[]
     */
    private $guests;

    /**
     * Presenters.
     *
     * @var Presenter[]
     */
    private $presenters;

    /**
     * Producers.
     *
     * @var Producer[]
     */
    private $producers;

    /**
     * Writers.
     *
     * @var Writer[]
     */
    private $writers;

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
     * Add an actor.
     *
     * @param Actor $actor The actor.
     * @return Credits Returns this credits.
     */
    public function addActor(Actor $actor) {
        $this->actors[] = $actor;
        return $this;
    }

    /**
     * Add an adapter.
     *
     * @param Adapter $adapter The adapter.
     * @return Credits Returns this credits.
     */
    public function addAdapter(Adapter $adapter) {
        $this->adapters[] = $adapter;
        return $this;
    }

    /**
     * Add a commentator.
     *
     * @param Commentator $commentator The commentator.
     * @return Credits Returns this credits.
     */
    public function addCommentator(Commentator $commentator) {
        $this->commentators[] = $commentator;
        return $this;
    }

    /**
     * Add a composer.
     *
     * @param Composer $composer The composer.
     * @return Credits Returns this credits.
     */
    public function addComposer(Composer $composer) {
        $this->composers[] = $composer;
        return $this;
    }

    /**
     * Add a director.
     *
     * @param Director $director The director.
     * @return Credits Returns this credits.
     */
    public function addDirector(Director $director) {
        $this->directors[] = $director;
        return $this;
    }

    /**
     * Add an editor.
     *
     * @param Editor $editor The editor.
     * @return Credits Returns this credits.
     */
    public function addEditor(Editor $editor) {
        $this->editors[] = $editor;
        return $this;
    }

    /**
     * Add a guest.
     *
     * @param Guest $guest The guest.
     * @return Credits Returns this credits.
     */
    public function addGuest(Guest $guest) {
        $this->guests[] = $guest;
        return $this;
    }

    /**
     * Add a presenter.
     *
     * @param Presenter $presenter The presenter.
     * @return Credits Returns this credits.
     */
    public function addPresenter(Presenter $presenter) {
        $this->presenters[] = $presenter;
        return $this;
    }

    /**
     * Add a producer.
     *
     * @param Producer $producer The producer.
     * @return Credits Returns this credits.
     */
    public function addProducer(Producer $producer) {
        $this->producers[] = $producer;
        return $this;
    }

    /**
     * Add a writer.
     *
     * @param Writer $writer The writer.
     * @return Credits Returns this credits.
     */
    public function addWriter(Writer $writer) {
        $this->writers[] = $writer;
        return $this;
    }

    /**
     * Get the actors.
     *
     * @return Actor[] Returns the actors.
     */
    public function getActors() {
        return $this->actors;
    }

    /**
     * Get the adapters.
     *
     * @return Adapter[] Returns the adapters.
     */
    public function getAdapters() {
        return $this->adapters;
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
     * Get the composers.
     *
     * @return Composer[] Returns the composers.
     */
    public function getComposers() {
        return $this->composers;
    }

    /**
     * Get the directors.
     *
     * @return Director[] Returns the directors.
     */
    public function getDirectors() {
        return $this->directors;
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
     * Get the guests.
     *
     * @return Guest[] Returns the guests.
     */
    public function getGuests() {
        return $this->guests;
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
     * Get the producers.
     *
     * @return Producer[] Returns the producers.
     */
    public function getProducers() {
        return $this->producers;
    }

    /**
     * Get the writers.
     *
     * @return Writer[] Returns the writers.
     */
    public function getWriters() {
        return $this->writers;
    }

    /**
     * Determines if this credits has actors.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasActors() {
        return 1 <= count($this->actors);
    }

    /**
     * Determines if this credits has adapters.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasAdapters() {
        return 1 <= count($this->adapters);
    }

    /**
     * Determines if this credits has commentators.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasCommentators() {
        return 1 <= count($this->commentators);
    }

    /**
     * Determines if this credits has composers.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasComposers() {
        return 1 <= count($this->composers);
    }

    /**
     * Determines if this credits has directors.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasDirectors() {
        return 1 <= count($this->directors);
    }

    /**
     * Determines if this credits has editors.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasEditors() {
        return 1 <= count($this->editors);
    }

    /**
     * Determines if this credits has guests.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasGuests() {
        return 1 <= count($this->guests);
    }

    /**
     * Determines if this credits has presenters.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasPresenters() {
        return 1 <= count($this->presenters);
    }

    /**
     * Determines if this credits has producers.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasProducers() {
        return 1 <= count($this->producers);
    }

    /**
     * Determines if this credits has writers.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasWriters() {
        return 1 <= count($this->writers);
    }

    /**
     * Set the actors.
     *
     * @param Actor[] $actors The actors.
     * @return Credits Returns this credits.
     */
    protected function setActors(array $actors) {
        $this->actors = $actors;
        return $this;
    }

    /**
     * Set the adapters.
     *
     * @param Adapter[] $adapters The adapters.
     * @return Credits Returns this credits.
     */
    protected function setAdapters(array $adapters) {
        $this->adapters = $adapters;
        return $this;
    }

    /**
     * Set the commentators.
     *
     * @param Commentator[] $commentators The commentators.
     * @return Credits Returns this credits.
     */
    protected function setCommentators(array $commentators) {
        $this->commentators = $commentators;
        return $this;
    }

    /**
     * Set the composers.
     *
     * @param Composer[] $composers The composers.
     * @return Credits Returns this credits.
     */
    protected function setComposers(array $composers) {
        $this->composers = $composers;
        return $this;
    }

    /**
     * Set the directors.
     *
     * @param Director[] $directors The directors.
     * @return Credits Returns this credits.
     */
    protected function setDirectors(array $directors) {
        $this->directors = $directors;
        return $this;
    }

    /**
     * Set the editors.
     *
     * @param Editor[] $editors The editors.
     * @return Credits Returns this credits.
     */
    protected function setEditors(array $editors) {
        $this->editors = $editors;
        return $this;
    }

    /**
     * Set the guests.
     *
     * @param Guest[] $guests The guests.
     * @return Credits Returns this credits.
     */
    protected function setGuests(array $guests) {
        $this->guests = $guests;
        return $this;
    }

    /**
     * Set the presenters.
     *
     * @param Presenter[] $presenters The presenters.
     * @return Credits Returns this credits.
     */
    protected function setPresenters(array $presenters) {
        $this->presenters = $presenters;
        return $this;
    }

    /**
     * Set the producers.
     *
     * @param Producer[] $producers The producers.
     * @return Credits Returns this credits.
     */
    protected function setProducers(array $producers) {
        $this->producers = $producers;
        return $this;
    }

    /**
     * Set the writers.
     *
     * @param Writer[] $writers Th writers.
     * @return Credits Returns this credits.
     */
    protected function setWriters(array $writers) {
        $this->writers = $writers;
        return $this;
    }
}
