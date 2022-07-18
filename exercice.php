<?php
abstract class Db{
    protected $file = '';
    protected $content =[];
    
    function getFromFile(){
        $this->content = json_decode(
            file_get_contents($this->file),true  
        );
    }
    function pushToFile(){
        file_put_contents($this->file, json_encode($this->content));
    }
}

class Users extends Db{
    protected $file = 'user.json';

    function setContent($userDetails){
        var_dump($this->content);
        $this->content = array_merge($this->content, $userDetails);
        var_export($this->content);
        echo "<hr>";
    }
}

class Orders extends Db{

}

$users = new Users();
$users-> getFromFile();
$users-> setContent(["yuti"=>["id"=>4,"status"=>"notWait"]]);
$users-> pushToFile();