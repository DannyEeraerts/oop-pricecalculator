<?php

require_once "classes/product.class.php";

function importProduct()
{
    $json_url = 'assets/products.json';
    $json = file_get_contents($json_url);
    $productData = json_decode($json, TRUE);
    $productList = [];

    for ($i=0; $i<count($productData); $i++){

            $product = new product($productData[$i]['id'] , $productData[$i]['name'], $productData[$i]['description'] ,$productData[$i]['price']);
            array_push($productList, $product);
    }
    return $productList;
}


