<?php

class product{
    public $productId;
    public $productName;
    public $productDescription;
    public $productPrice;

    public function __construct($productId, $productName, $productDescription, $productPrice){
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productDescription = $productDescription;
        $this->productPrice = $productPrice;
    }

    public function get_productID() {
        return $this->productId;
    }

    public function get_productName(){
        return $this->productName;
    }

    public function get_productDescription(){
        return $this->productDescription;
    }

    public function get_productPrice(){
        return $this->productPrice;
    }

}