<?php

class App {

    public static $dumpster = 'It works';
    public $db;

    public function __construct($input) {
        self::$dumpster = $input;
        $this->db = $input;
    }

}

//print App::$dumpster;

$object1 = new App('new input');
$object2 = new App('object 2 says hello');

var_dump($object1);
var_dump($object2);
print App::$dumpster;
