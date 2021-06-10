<?php
    class generalCategory{
        private $name='All Items';
        private $id=0;
        private $picture='storeFront.jpg';

        private $selection;
        private $expansive;
        private $expansiveArray;
        private $cheapest;
        private $cheapArray;
        private $example;
        private $examplesArray;
        //these functions will be used to build the object
        public function addToSelection($value){
            $this->selection+=$value;
        }

        public function addToExpansive($value){
            $this->expansiveArray[]=$value;
        }

        public function addToCheapest($value){
            $this->cheapArray[]=$value;
        }

        public function addToExample($value){
            $this->examplesArray[]=$value;
        }
        //checks for property
        public function get($key){
            if(property_exists($this,$key)){
                return $this->$key;
            }else{
                return 'no such property';
            }
        }
        //returns price of cheapest item in the store
        public function findCheapest(){
            $tracker=0;
            $price=$this->cheapArray[$tracker];
            for ($i=1; $i < count($this->cheapArray); $i++) { 
                if ($this->cheapArray[$i]<$price){
                    $tracker=$i;
                    $price=$this->cheapArray[$i];
                }
            }
            $this->cheapest=$price;
        }
        //returns price of most expansive item
        public function findExpansive(){
            $tracker=0;
            $price=$this->expansiveArray[$tracker];
            for ($i=1; $i < count($this->expansiveArray); $i++) { 
                if ($this->expansiveArray[$i]>$price){
                    $tracker=$i;
                    $price=$this->expansiveArray[$i];
                }
            }
            $this->expansive=$price;
        }
        //chooses a number of random examples max of three.
        public function chooseExamples(){
            $string='';
            //
            if(count($this->examplesArray)>6){
                $numb=3;
            }else{
                //if only five items 3 would be too much so two or less better.
                $numb=floor(count($this->examplesArray)/2);
            }
            //array_rand choses random from an array, with a number given.
            $chosen=array_rand($this->examplesArray,$numb);
            for ($i=0; $i < $numb; $i++) { 
                $string.=" ".$this->examplesArray[$chosen[$i]].',';
            }
            //makes sure string is readable
            $nstring=substr($string, 0, -1).".";
            
            $this->example=$nstring;
        }
        //gets category ensures it has values of category and adds it to the objects data.
        public function addCategory($category){
            if($category instanceof Category){
                $this->addToSelection($category->get('selection'));
                $this->addToCheapest($category->get('cheapest'));
                $this->addToExpansive($category->get('expansive'));
                $this->addToExample($category->get('example'));
            }
        }
        //makes it into a catagory object.
        public function finishObject(){
            $this->findCheapest();
            $this->findExpansive();
            $this->chooseExamples();
        }
    }
?>