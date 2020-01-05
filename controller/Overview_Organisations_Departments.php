<?php

require_once "model/classes/product.class.php";
require_once "model/classes/customer.class.php";
require_once "model/classes/department.class.php";
require_once "model/classes/organisation.class.php";
require_once "model/classes/discount.class.php";
require "Departments.php";
require "Discounts.php";
require "Organisations.php";

session_start();

function overview()
{

    getOrganisations(); // pick up all organisations
    getDepartment(); // pick up all departments
    $organisationList = $_SESSION['organisationList'];
    $departmentList = $_SESSION['departmentList'];

    // sort organisationList
    usort($organisationList, function($a, $b)
    {
        return strcmp($a->organisationName, $b->organisationName);
    });


    // sort departmentList
    usort($departmentList, function($a, $b)
    {
        return strcmp($a->departmentName, $b->departmentName);
    });

    foreach ($organisationList as $organisation) {
        $organisationName = $organisation->get_organisationtName();
        $organisationId = $organisation->get_organisationId();
        $organisationDiscountAmount = $organisation->get_discountAmount();
        $organisationDiscountType = $organisation->get_discountId();
        if ($organisationDiscountType == 0){
            $discountType = " % (variabel)";
        }
        else{
            $discountType = " € (fixed)";
        }
        echo "<div class= 'row'>";
        echo "<div class= 'col-3 offset-1'>";
        echo "<h2 class='text-success'>" . $organisationName . "</h2>";
        echo "</div>";
        echo "<div class= 'col-6'>";
        echo "<p class='mt-2'>Organisation discountamount: ". "<strong>". "<span class='text-success'>". $organisationDiscountAmount . $discountType."</strong>" ."<span>". "</p>";
        echo "</div>";
        echo "</div>";
        foreach ($departmentList as $department) {
            if ($organisationId == $department->get_orgId()) {
                $departmentName = $department->get_departmentName();
                $departmentDiscountAmount = $department->get_discountAmount();
                $departmentDiscountType = $department->get_discountId();
                if ($departmentDiscountType == 0){
                    $discountType = " % (variabel)";
                }
                else{
                    $discountType = " € (fixed)";
                }
                echo "<div class= 'row'>";
                echo "<div class= 'col-4 offset-2'>";
                echo "<h4 class='text-info mb-0'>" . $departmentName . "</h4>"."<br>";
                echo "</div>";
                echo "<div class= 'col-5'>";
                echo "<p class='mt-2'>Department discountamount: " . "<strong>" . "<span class='text-info'>". $departmentDiscountAmount . $discountType."</strong>"."</span>". "</p>";
                echo "</div>";
                echo "</div>";
            }
        }
    }
}


