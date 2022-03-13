<?php

interface Log{
    public function write();
}

class Text implements Log{
    public function write(){
        echo 'Saving to text file';
    }
}

class Memory implements Log{
    public function write(){
        echo 'Saving to memory';
    }
}

class Services{
    protected static $services = null;
    public $container = [];

    protected function __construct()
    {
       
    }

    public static function create(){
        if(!static::$services){
            static::$services = new static();
        }

        return static::$services;
    }

    public function register($name, $class){
        $this->container[$name] = $class;//$this->containers = ['text' => Text,'memory' => Memory]
    }

    
}

$services = Services::create();
$services->register('text',Text::class);
$services->register('memory',Memory::class);
echo "<pre>";
var_dump($services);


class ProviderException extends Exception{
    public static function providerNotFound($type){
        return new static("We don't have $type provide in our services container");
    }
}
class Provider{
    private $services;

    public function __construct($services)
    {
        $this->services = $services->container; //$this->services = ['text' => Text,'memory'=> Memory]
    }

    public function make($type){
        if(!array_key_exists($type, $this->services)){
            throw  ProviderException::providerNotFound($type);
        }

        return new $this->services[$type]; //new Text
    }
}

try{
    $provider = new Provider($services);
    $text_log = $provider->make('memory');
    echo $text_log->write();
}catch(ProviderException $e){
    echo $e->getMessage();
}