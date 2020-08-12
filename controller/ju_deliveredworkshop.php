<?php

//Import the models
include('../model/display_workshop.php');
include('../model/stakeholders.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}
$id_judge = $_SESSION['id'];

$tabDWorkshops = displayMyWorkshops($bdd, $id_judge, 2);

//Add the list of workshops in a session variable
$_SESSION['tabDWorkshops'] = $tabDWorkshops;
//Display the view
header('location: ../view/ju_viewdeliveredworkshop.php');
