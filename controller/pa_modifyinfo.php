<?php

//Import the models
include('../model/stakeholders.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}

$id = $_SESSION['id'];
$newemail = $_POST['email'];
$newjob = $_POST['job'];

modifyInfo($bdd, $id, $newemail, $newjob);
$newemail = updateInfo($bdd, $id)[0];
$newjob = updateInfo($bdd, $id)[1];

$_SESSION['email'] = $newemail;
$_SESSION['job'] = $newjob;


//Display the view
header('location: ../view/myprofile.php');