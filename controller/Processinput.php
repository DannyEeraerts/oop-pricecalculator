<?php

require_once "model/classes/product.class.php";
require_once "model/classes/customer.class.php";
require_once "model/classes/department.class.php";
require_once "model/classes/organisation.class.php";
require_once "model/classes/discount.class.php";
require "Departments.php";
require "Discounts.php";
require "Organisations.php";

//session_start();

    function customerDetails($customer_name){

        if ($customer_name !== "Choose customer") { //customer name must be choosen

            $customerList = $_SESSION['customerList'];

            for ($i = 0; $i < count($customerList); $i++) {
                if ($customerList[$i]->get_customerName() == $customer_name) {
                    $customerDetails = $customerList[$i];
                }
            }

            getDepartment(); // pick up all departments

            $departmentList = $_SESSION['departmentList'];
            $departmentId = $customerDetails->get_value(); // get the department to which the customer belongs

            for ($i = 0; $i < count($departmentList); $i++) {
                if ($departmentList[$i]->get_departmentId() == $departmentId) {
                    $departmentDetails = $departmentList[$i];
                    $_SESSION['departmentDiscountAmount'] = $departmentDetails->get_discountAmount();
                }
            }

            getOrganisations(); // pick up all organisations

            $organisationList = $_SESSION['organisationList'];
            $organisationId = $departmentDetails->get_orgid(); // get the organisation to which the department belongs

            for ($i = 0; $i < count($organisationList); $i++) {
                if ($organisationList[$i]->get_organisationId() == $organisationId) {
                    $organisationDetails = $organisationList[$i];
                    $_SESSION['organisationDiscountAmount'] = $organisationDetails->get_discountAmount();
                }
            }

            getDiscounts(); // pick up all discounts

            $discountList = $_SESSION['discountList'];
            $_SESSION['discountIdDepartment'] = $departmentDetails->get_discountId(); // get the discounttype from  the department
            $_SESSION['discountIdOrganisation'] = $organisationDetails->get_discountId(); // get the discounttype from  the organisation

            for ($i = 0; $i < count($discountList); $i++) {
                if ($discountList[$i]->get_discountId() == $_SESSION['discountIdDepartment']) {
                    $discountDetailsDepartment = $discountList[$i];
                }
            }

            for ($i = 0; $i < count($discountList); $i++) {
                if ($discountList[$i]->get_discountId() == $_SESSION['discountIdOrganisation']) {
                    $discountDetailsOrganisation = $discountList[$i];
                }
            }



            echo "Name: " . "<strong>" . $customerDetails->get_customerName() . "</strong>" . "<br>";
            echo "Organisation: " . "<strong>" . $organisationDetails->get_organisationtName(). "</strong>" . "<br>";
            if ($discountDetailsOrganisation->get_discountName() === "variable-discount") {
            echo "DiscountAmount for organisation: " . "<strong>" . $organisationDetails->get_discountAmount() . " % (variable) </strong>" . "<br>";
            }
            else{
                echo "DiscountAmount for organisation: " . "<strong>" . $organisationDetails->get_discountAmount() . " € (fixed) </strong>" . "<br>";
            }
            echo "Department: " . "<strong>" . $departmentDetails->get_departmentName() . "</strong>" . "<br>";
            if ($discountDetailsDepartment->get_discountName() === "variable-discount") {
                echo "DiscountAmount for department: " . "<strong>" . $departmentDetails->get_discountAmount() . " % (variable) </strong>" . "<br>";
            }
            else{
                echo "DiscountAmount for department: " . "<strong>" . $departmentDetails->get_discountAmount() . " € (fixed) </strong>" . "<br>";
            }
        }
        else {
            echo "<span class='text-danger'>You didn't choose a customer</span>";
        }
    }

    function productDetails($product_nr, $number){

        if ($product_nr !== "Choose product") {    //product must be choosen

            $productList = $_SESSION['productList'];

            for ($i = 0; $i < count($productList); $i++) {
                if ($productList[$i]->get_productID() == intval($product_nr)) {
                    $productDetails = $productList[$i];
                }
            }

            // calculate biggest discount

            $departmentDiscountAmount=$_SESSION['departmentDiscountAmount'];
            $organisationDiscountAmount=$_SESSION['organisationDiscountAmount'];
            $productprice = $productDetails->get_productPrice();

            if( $_SESSION['discountIdDepartment']===$_SESSION['discountIdOrganisation']){

                if ($_SESSION['discountIdDepartment']===1){

                    if ($departmentDiscountAmount >= $organisationDiscountAmount) {
                        $biggestDiscount = $departmentDiscountAmount;
                        $discountPrice = ($productprice - $biggestDiscount)*$number;
                    } else {
                        $biggestDiscount = $organisationDiscountAmount;
                        $discountPrice = ($productprice - $biggestDiscount)*$number;
                    }
                }
                else {

                    if ($departmentDiscountAmount >= $organisationDiscountAmount) {
                        $biggestDiscount = $departmentDiscountAmount;
                        $discountPrice = ($productprice - ($biggestDiscount / 100) * $productprice)*$number;

                    } else {
                        $biggestDiscount = $organisationDiscountAmount;
                        $discountPrice = ($productprice - ($biggestDiscount / 100) * $productprice)*$number;
                    }
                }
            }
            else {
                if ($_SESSION['discountIdDepartment']===1){

                    if ( ($productprice - $departmentDiscountAmount)  <= ($productprice-($organisationDiscountAmount/100 * $productprice)) ) {
                        $discountPrice = ($productprice - $departmentDiscountAmount)*$number;
                    }
                    else {
                        $discountPrice = ($productprice - (($organisationDiscountAmount/100) * $productprice))*$number;
                    }
                }
                else {

                    if ( ($productprice - $organisationDiscountAmount)  <= ($productprice-($departmentDiscountAmount/100 * $productprice)) ) {
                        $discountPrice = ($productprice - $organisationDiscountAmount)*$number;
                    }
                    else {
                        $discountPrice = ($productprice - (($departmentDiscountAmount/100) * $productprice))*$number;
                    }
                }
            }
            if ($discountPrice <= 0){
                $discountPrice = 0;
            }

            // echo results

            echo "ID: " . "<strong>" . $productDetails->get_productID() . "</strong>" . "<br>";
            echo "Name: " . "<strong>" . $productDetails->get_productName() . "</strong>" . "<br>";
            echo "Description: " . "<strong>" . $productDetails->get_productDescription() ."</strong>" ."<br>";
            echo "Quantity: " ."<strong>" .$number."</strong>" ."<br>";
            echo "Normal unit price: " . "<strong><del>" . $productDetails->get_productPrice() . " €" . "</strong></del>" ."<br>";
            echo "Total reduced price (with best discount): ". "<strong><span class='text-success '>" .$discountPrice . "</span>" . "<span class='text-success '> €</span></strong>";
        }
        else {
            echo "<span class='text-danger'>You didn't choose a product</span>"; // message if there is no product is choosen
        }
    }




