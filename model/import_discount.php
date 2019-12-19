<?php

require_once "classes/discount.class.php";

//importDiscount();

function importDiscount()
{
    $json_url = 'assets/discount.json';
    $json = file_get_contents($json_url);
    $discountData = json_decode($json, TRUE);
    $discountList = [];

    for ($i = 0; $i < count($discountData); $i++) {

        $discount = new discount($discountData[$i]['id'], $discountData[$i]['name']);
        array_push($discountList, $discount);
    }
    //var_dump($discountList);
    return $discountList;
}