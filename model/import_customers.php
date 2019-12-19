<?php


require_once "classes/customer.class.php";

function importCostumer()
{
    $json_url = 'assets/customer.json';
    $json = file_get_contents($json_url);
    $customerData = json_decode($json, TRUE);
    $customerList = [];

    for ($i = 0; $i < count($customerData); $i++) {

        $customer = new customer($customerData[$i]['id'], $customerData[$i]['name'], $customerData[$i]['group_id']);
        array_push($customerList, $customer);
    }
    return $customerList;
}
