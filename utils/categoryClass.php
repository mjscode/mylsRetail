<?php
class Category{
    //contains all the properties that the query will bring back from the database, gives several default values where there's none entered.
    private $id='';
    private $name='';
    private $picture='';
    private $selection=0;
    private $expansive=0;
    private $cheapest=0;
    private $example='';
    
        public function __construct($array){
            foreach($array as $key=>$value){
                //ensures that propert exists if not it will creat it but give it an error value
                if(property_exists($this,$key)){
                    $this->$key=$value;
                }else{
                    $this->$key="sorry not valid property";
                }
            }
        }
        
    public function get($s){
        //gets property if exists.
          if(property_exists($this,$s)){
            return $this->$s;
        }else{
            return 'no such value';
        }
        }
        
    }


?>