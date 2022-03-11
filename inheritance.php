<?php 

class Collection{
    protected array $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function sum($key){
        return array_sum( array_map(function($item) use($key){
            return $item->$key;
        },$this->items));
    }
}

class Video{
    public $title;
    public $length;

    public function __construct($title,$length)
    {
        $this->title = $title;
        $this->length = $length;
    }
}

class VideoCollection extends Collection{
    public function length(){
        return $this->sum('length');
    }
}

$collection = new Collection([
    new Video('My Video',100),
    new Video('My Video2',200),
    new Video('My Video3',300),
]);

$video = new VideoCollection([
    new Video('My Video',100),
    new Video('My Video2',200),
    new Video('My Video3',300),
]);
echo "<pre>";
var_dump($collection);

echo($video->length());

class Achievement{
    public function name(){
        return 'Achievement';
    }

    public function difficulty(){
        echo "medium";
    }
}

class TenThousandsPoints extends Achievement{
    public function qualify($user){

    }

    public function name(){
        return 'Ten Thousand Points';
    }
}

$achievement = new Achievement();
echo "<br/>";
echo $achievement->name();

$ten = new TenThousandsPoints();
echo $ten->name();