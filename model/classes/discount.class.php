<?php

class discount{
    public $discountId;
    public $discountName;

    public function __construct($discountId,$discountName){
        $this->discountId = $discountId;
        $this->discountName =$discountName;
    }

    public function get_discountId() {
        return $this->discountId;
    }

    public function get_discountName(){
        return $this->discountName;
    }

}