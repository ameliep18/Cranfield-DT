<?php
//view innovative solutions

//Import the models
include('../model/display_workshop.php');
include('../model/stakeholders.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}

$id = $_GET['id'];
$_SESSION['id_workshop'] = $id;
$_SESSION['title'] = getTitleFromId($bdd, $id);
$_SESSION['link'] = getLink($bdd, $id);

header('location: ../view/expert_helpgroup.php');
