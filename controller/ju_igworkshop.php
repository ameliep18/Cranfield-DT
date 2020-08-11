<?php

//Import the models
include('../model/display_workshop.php');
include('../model/stakeholders.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}
$id_judge = $_SESSION['id'];

$tabWorkshops = displayMyWorkshops($bdd, $id_judge, 1);

//Add the list of workshops in a session variable
$_SESSION['tabWorkshops'] = $tabWorkshops;
//Display the view
header('location: ../view/ju_viewigworkshop.php');