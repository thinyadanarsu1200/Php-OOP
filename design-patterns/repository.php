<?php
class Model{
    public function save(){
        echo "Saving $this->name and $this->age";
    }
}

class Repository{
    public function update($data){
        $name = $data['name']?? 'Unknown';
        $age = $data['age']?? 'Unknown age';

        $model = new Model();
        $model->name = $name;
        $model->age = $age;
        $model->save();
    }
}

class User{
    public function __construct(private Repository $repository){

    }
    
    public function update($data){
        $this->repository->update($data);
    }
}

$user= new User(new Repository);
$user->update(['name' => 'MNK','age' =>'22']);