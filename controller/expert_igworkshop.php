<?php

//Import the models
include('../model/display_workshop.php');
include('../model/stakeholders.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}
$id_expert = $_SESSION['id'];

$tabIDGroups = displayMyGroupsID($bdd, $id_expert);
$imax = sizeof($tabIDGroups);
for ($i=0; $i<$imax/2; $i=$i+1) {
    $id_workshop = $tabIDGroups[$i+1];
    $tabWorkshop = displayMyWorkshop($bdd, $id_workshop);
}



//Add the list of workshops in a session variable
$_SESSION['tabIDGgroups'] = $tabIDGroups;
$_SESSION['tabWorkshop'] = $tabWorkshop;

//Display the view
header('location: ../view/expert_viewigworkshop.php');
