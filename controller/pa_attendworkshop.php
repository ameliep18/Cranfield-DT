<?php

//Import the models
include('../model/display_workshop.php');
include('../model/stakeholders.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}
$id_participant = $_SESSION['id'];
$id_workshop = getWorkshopIdFromUserId($bdd, $id_participant);
$id_group = getGroupIdFromUserId($bdd, $id_participant);

$tabMyWorkshop = displayMyWorkshop($bdd, $id_workshop);
$tabMyGroup = displayMyGroup($bdd, $id_group);

//Add the list of workshops in a session variable
$_SESSION['tabMyWorkshop'] = $tabMyWorkshop;
$_SESSION['tabMyGroup'] = $tabMyGroup;
$_SESSION['id_workshop'] = $id_workshop;
//Display the view
header('location: ../view/pa_attendworkshop.php');
