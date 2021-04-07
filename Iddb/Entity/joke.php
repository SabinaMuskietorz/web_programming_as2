<?php
namespace Ijdb\Entity;
class Joke {
    public $authorsTable;
    public $id;
    public $jokeText;
    public $jokeDate;
    public $authorId;
    public function __construct(\CSY2028\DatabaseTable $authorsTable) {
        $this->authorsTable = $authorsTable;
    }
    public function getAuthor() {
        return $this->authorsTable->find('id', $this->authorId)[0];
    }
}
