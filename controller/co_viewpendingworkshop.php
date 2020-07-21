<?php

//Import the models
include('../model/display_workshop.php');
include('../model/stakeholders.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}
$id = $_GET['id'];
$_SESSION['id_workshop'] = $id;
//Display the list of workshops
$tab = displayOneWorkshop($bdd, $id, 0);

//Add the list of workshops in a session variable
$_SESSION['tabOneWorkshop'] = $tab;

//Display the view
header('location: ../view/co_viewpendingworkshop.php');
