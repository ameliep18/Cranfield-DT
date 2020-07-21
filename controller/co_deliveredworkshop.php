<?php

//Import the models
include('../model/display_workshop.php');
include('../model/stakeholders.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}

//Display the list of workshops
$tab2 = displayWorkshop($bdd, 2);

//Add the list of workshops in a session variable
$_SESSION['tabWorkshopD'] = $tab2;

//Display the view
header('location: ../view/co_deliveredworkshop.php');
