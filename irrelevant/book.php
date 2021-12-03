<?php


class Book extends Item{
    public $author;

    public function getDescription(){
        return $this->name . "by" . $this->author;
    }
}