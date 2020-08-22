<?php

//Import the models
include('../model/display_workshop.php');
include('../model/stakeholders.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}
echo $id_activity = $_GET['id'];

setActivityStatus($bdd, $id_activity, 1);


//Display the view
//header('location: ../controller/pa_attendworkshop.php');

