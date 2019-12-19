<?php

require_once "classes/department.class.php";

//importDepartment();

function importDepartment()
{
    $json_url = 'assets/department.json';
    $json = file_get_contents($json_url);
    $departmentData = json_decode($json, TRUE);
    $departmentList = [];

    for ($i = 0; $i < count($departmentData); $i++) {
        $department= new department($departmentData[$i]['id'], $departmentData[$i]['name'], $departmentData[$i]['discount_id'], $departmentData[$i]['discount_amount'], $departmentData[$i]['group_id'], $departmentData[$i]['org_id']);
        array_push($departmentList, $department);
    }
    //var_dump($departmentList);
    return $departmentList;
}

