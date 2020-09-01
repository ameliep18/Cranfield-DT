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
$link = getLink($bdd, $id);


$_SESSION['link'] = $link;

//Display the view
header('location: ../view/co_viewigworkshop.php');
