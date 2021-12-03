<?php
require 'item.php';
require 'book.php';


$my_item3=new Item('tanvir','the best');

var_dump($my_item3);
var_dump(Item::$count);
echo($my_item3->getName());

$my_book=new Book('Data Struc','Intro to data','Walter savitch');

echo($my_book->getDescription());
