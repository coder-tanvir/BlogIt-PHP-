<?php

class Item
{   
    public static $count=0;
    public $name;
    public $description="This is default value";
    public function __construct($arg1,$arg2){
        $this->name=$arg1;
        $this->description=$arg2;
        //Keeps the count of how many objects are created.
        static::$count++;

    }
    
    public function sayHello(){
        echo "Hello from Class";
    }

    public function getname(){
        return $this->name;
    }

    public function setName($name){
        $this->name=$name;
    }
    
    public function getDescription(){
        return $this->name;
    }
}
