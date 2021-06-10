<?php
class User{
    private $username;
    //defualt values...
    private $name="not listed";
    private $email="not listed";
    private $admin;


    public function __construct($array){
        foreach($array as $key=>$value){
            if(property_exists($this,$key)){
                if(!empty($value))
                $this->$key=$value;
            }else{
                $this->$key="sorry not valid property";
            }
        }
    }

    public function get($s){
        if(property_exists($this,$s)){
          return $this->$s;
      }else{
          return 'no such value';
      }
      }
}
?>