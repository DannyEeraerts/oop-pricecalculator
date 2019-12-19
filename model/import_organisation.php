<?php

require_once "classes/organisation.class.php";

//importOrganisation();

function importOrganisation()
{
    $json_url = 'assets/organisation.json';
    $json = file_get_contents($json_url);
    $organisationData = json_decode($json, TRUE);
    $organisationList = [];

    for ($i = 0; $i < count($organisationData); $i++) {

        $organisation = new organisation($organisationData[$i]['id'], $organisationData[$i]['name'], $organisationData[$i]['discount_amount'], $organisationData[$i]['discount_id']);
        array_push($organisationList, $organisation);
    }
    //var_dump($organisationList);
    return $organisationList;
}
