<?php

//Import the models
include('../model/display_workshop.php');
include('../model/stakeholders.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}

//Display the list of workshops
$tab1 = displayWorkshop($bdd, 0);

//Add the list of workshops in a session variable
$_SESSION['tabWorkshop'] = $tab1;

//Display the view
header('location: ../view/co_pendingworkshop.php');
