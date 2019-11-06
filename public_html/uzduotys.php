<?php

abstract class PassengerCar {

    protected $manufacturer;
    protected $model;
    protected $year;
    protected $wheel_count;
    protected $door_count;

    public function __construct($manufacturer, $model, $year, $wheel_count, $door_count) {
        $this->manufacturer = $manufacturer;
        $this->model = $model;
        $this->year = $year;
        $this->wheel_count = $wheel_count;
        $this->door_count = $door_count;
    }

    abstract public function drive(); 
        
    
    public function getWeels() {
        print "$this->model turi $this->wheel_count ratus <br />";
    }

    public function getDoors() {
        print "$this->model turi $this->door_count  duris <br />";
    }

}

abstract class Toyota extends PassengerCar {

    public function __construct($model, $year, $wheel_count, $door_count) {

        parent::__construct('Toyota', $model, $year, $wheel_count, $door_count);
    }

}

class Corolla extends Toyota {

    public function __construct($year) {
        parent::__construct('Corolla', $year, 4, 2);
    }

    public function drive() {
        print "$this->model važiuoja greitai <br/>";
    }

}
$corolla= new Corolla(2000);
$corolla->drive();
$corolla->getDoors();
$corolla->getWeels();
var_dump($corolla);