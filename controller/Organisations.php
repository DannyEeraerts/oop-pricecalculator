<?php


require 'model/import_organisation.php';

function getOrganisations()
{
    $organisationList = importOrganisation();
    $_SESSION['organisationList'] = $organisationList;

}


