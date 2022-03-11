<?php
class Person{
    public function __construct($name){
        $this->name = $name;
    }
   
    public function job()
    {
        # code...
        return "I'm software engineer";
    }

    public function favouriteMovie(){
        return "Barbie";
    }

    private function thingsThatIDoInNight()
    {
        # code...
        return "I dream about u";
    }
}

$person = new Person();

$method = (new ReflectionMethod(Person::class,'thingsThatIDoInNight'));
$method->setAccessible(true);
echo "<pre>";
var_dump($method);

