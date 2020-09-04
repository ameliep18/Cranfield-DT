<?php

//Import the model
include('../model/prototype_images.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}
$id_group = $_GET['id'];
$_SESSION['id_group'] = $id_group;
$url = getGroupImage($bdd, $id_group);
$_SESSION['output'] = $url;

header('location: ../view/ju_viewfeatures.php');
