<?php


require 'model/import_department.php';

function getDepartment()
{
    $departmentList = importDepartment();
    $_SESSION['departmentList'] = $departmentList;

    /*foreach ($departmentList as $department) {
        $departmentName = $department->get_departmentName();
        $departmentDiscountId = $department->get_discountId();
        $departmentDiscountAmount = $department->get_discountAmount();
        $departmentGroupId = $department->get_groupId();
        $departmentOrganisationId = $department->get_orgId();
    }*/
}
