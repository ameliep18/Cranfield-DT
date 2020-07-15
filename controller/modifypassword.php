<?php

//Import the models
include('../model/employee.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}

$id = $_SESSION['id'];
$newpassword = $_POST['password'];

modifyPassword($bdd, $id, $newpassword);



//Display the view
header('location: ../view/myprofile.php');