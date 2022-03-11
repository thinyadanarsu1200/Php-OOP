<?php

class UserFactory{
    protected static $data = [];

    public function __construct($data)
    {
        static::$data = $data;
    }

    public static function create($data){
        new static($data);
        $result = [];

        foreach(static::$data as $d){
            $name = $d['name']?? 'Unknown';
            $email = $d['email']??'test@gmail.com';
            $result[] = new User($name, $email);
        }

        return $result;
    }
}

class User{
    public $name;
    public $email;

    public function __construct($name,$email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    
}

$data= [
    ['name' => 'mnk'],
    ['name' => 'tys','email' => 'tys@gmail.com'],
];

$users = UserFactory::create($data);

echo "<pre>";
var_dump($users);