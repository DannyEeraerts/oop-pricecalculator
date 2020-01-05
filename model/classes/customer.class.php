<?php

class customer{
    public $customerId;
    public $customerName;
    public $customerGroupID;


    public function __construct($customerId,$customerName,$customerGroupID){
        $this->customerId = $customerId;
        $this->customerName =$customerName;
        $this->customerGroupID =$customerGroupID;
    }

    public function get_customerID() {
        return $this->customerId;
    }

    public function get_customerName(){
        return $this->customerName;
    }

    public function get_value(){
        return $this->customerGroupID;
    }

}