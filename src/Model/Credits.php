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
     * Guests.
     *
     * @var Guest[]
     */
    private $guests;

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
        $this->setComposers([]);
        $this->setGuests([]);
        $this->setDirectors([]);
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
     * Get the guests.
     *
     * @return Guest[] Returns the guests.
     */
    public function getGuests() {
        return $this->guests;
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
