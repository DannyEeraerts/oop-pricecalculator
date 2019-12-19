<?php

require 'model/import_customers.php';

function getCustomerNames(){
    $customerList = importCostumer();
    $_SESSION['customerList'] = $customerList;

    foreach ($customerList as $customer) {
        $customerName = $customer->get_customerName();
        echo "<option value=\"$customerName\" name=\"customer\">" . $customerName . "</option>";
    }
}
