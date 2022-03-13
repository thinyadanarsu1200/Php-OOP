<?php


interface Log{
    public function write();
}

class TextLogger implements Log{
    public function write(){
        echo "text logger";
    }
}

class DatabaseLogger implements Log{
    public function write(){
        echo "database logger";
    }
}

class App{
    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    public function run(){
        return $this->log->write();
    }
}

// $app =new App(new TextLogger);
// echo $app->run();

class Services{
    private static $services = null;
    public $container = [];
    protected function __construct()
    {
        
    }

    public static function create(){
        if(!static::$services){
            static::$services = new self();
        }

        return static::$services;
    }

    public function register($name, $fun){
        $this->container[$name] = $fun();
    }
}

$services = Services::create();
$services->register('app',function(){
    return new App(new TextLogger);
});

echo "<pre>";
print_r($services);

class Provider{
    private $services;

    public function __construct(Services $services)
    {
        $this->services = $services->container;
    }

    public function make($type){
        if(!array_key_exists($type,$this->services)){
            throw new Exception('We dont have yet');
        }

        return$this->services[$type];
    }
}

$provider =new Provider($services);
$app = $provider->make('app');
echo "<pre>";
print_r($provider->make('app')->run());