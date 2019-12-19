<?php

require 'model/import_discount.php';

function getDiscounts()
{
    $discountList = importDiscount();
    $_SESSION['discountList'] = $discountList;

    /*foreach ($discountList as $discount) {
        $discountID = $discount->get_discountId();
        $DiscountName = $discount->get_discountName();
    }*/
}


