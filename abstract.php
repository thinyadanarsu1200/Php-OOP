<?php

use Achievement as GlobalAchievement;

abstract class Achievement{ //abstract class cannot instantiate
    public function name(){
        $class =  (new ReflectionClass($this))->getShortName();
        return trim(preg_replace('/[A-Z]/',' $0',$class));
    }

    public function icon(){
        return strtolower(preg_replace('/[\s]/','-',$this->name()).'.png');
    }

    abstract public function qualify($user);
}

class FirstThousandsPoint extends Achievement{
    public function qualify($user){

    }
}

class BestAnswer extends Achievement{
    public function qualify($user){
        
    }
}

$achievement = new FirstThousandsPoint();
echo $achievement->name();
echo "<br/>";
echo $achievement->icon();

$best_answer = new BestAnswer();
echo "<br/>";
echo $best_answer->name();