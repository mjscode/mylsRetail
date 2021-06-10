<?php
    class queryBuilder{
        //takes the post request.
        public function __construct($assosArray) {
                foreach($assosArray as $key=>$value){
                    $this->$key=$value;
                }
        }
        //these are the coloumns in the table that data is being entered
        private function insert_query_keys(){
            $string='';
            foreach($this as $key=>$value){                                        
                $string.=$key.",";
            }
            //ensures that the string doesn't end with ','.
            $qString=substr_replace($string, "", -1);
            return $qString;
        }
        //adds to the next part of the query by getting the values.
        private function insert_query_values(){
            $string='';
            foreach($this as $key=>$value){                                        
                $string.=':'.$key.",";
            }
            $qString=substr_replace($string, "", -1);
            return $qString;
        }
        //combines the two...
        public function insert_query_string($table){
            return 'insert into '.$table.' ('.
            $this->insert_query_keys().') values ('.
            $this->insert_query_values().')';
        }
        //uses hash to hide password to make it more difficult to gues.
        private function hashPass(){
            if(property_exists($this,'password')){
                $this->password=password_hash($this->password, PASSWORD_DEFAULT);  
            }
        }
        public function bindValues($statement){
            $this->hashPass();
            //binds the values with the keys.
            foreach($this as $key=>$value){
                $statement->bindValue($key,$value);
            }
        } 
    }
?>
