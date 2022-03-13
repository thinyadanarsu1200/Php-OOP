<?php

class CheckOil{
    public function check(){
        echo "check oil";
    }
}

class CheckBreak{
    public function check(){
        echo "check break";
    }
}

class Car{
    protected $oil;
    protected $break;
    public function __construct()
    {
        $this->oil= new CheckOil();
        $this->break = new CheckBreak();
    }

    public function start(){
        new static();
        $this->oil->check();
        $this->break->check();
        echo 'Car is started!';
    }
}

$car =new Car;
var_dump($car->start());