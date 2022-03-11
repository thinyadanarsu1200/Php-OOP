<?php

// class Team{
//     protected $name;
//     protected $members=[];

//     public function __construct($name,$members,$description)
//     {
//         $this->name = $name;
//         $this->members = $members;
//         $this->description = $description;
//     }
//     public function name(){
//         return $this->name;
//     }

//     public function members(){
//         return $this->members;
//     }

//     public function addMember($new_member){
//         $this->members[] = $new_member;
//     }

//     public static function start(...$params){
//         return new static(...$params);
//     }
// }

// class Member{
//     protected $name;
//     protected $email;

//     public function __construct($name,$email)
//     {
//         $this->name = $name;
//         $this->email = $email;
//     }

//     public function name(){
//         return $this->name;
//     }
//     public function email(){
//         return $this->email;
//     }
// }

// $laracast_team = Team::start('laracast',
// [new Member('Aung','aung@gmail.com'),
// new Member('su','su@gmail.com')],"This team is awesome");

// $laracast_team->addMember('Zaw Zaw');
// echo "<pre>";
// var_dump($laracast_team->members());