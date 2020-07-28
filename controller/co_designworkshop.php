<?php


//Import the models
include('import_models.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}

//Allocate a value to each variable
$title = $_POST['title'];
$start_date = $_POST['startdate'];
$end_date = $_POST['enddate'];
$goals = $_POST['goals'];
$id_coordinator = $_SESSION['id'];
$id_judges = $_POST['judge'];
$id_technicians = $_POST['tech'];
$nb_groups = $_POST['nbgroup'];
$status = 0;

//Create the workshop in the database
createWorkshop($bdd, $title, $start_date, $end_date, $goals, $id_coordinator, $id_judges, $id_technicians, $nb_groups, $status);

echo $id_workshop = getIdFromTitle($bdd,$title);
if ($nb_groups=="1"){
    $g1participants = $_POST['group1'];
    $g1expert = $_POST['group1expert'];
    createGroup($bdd, $id_workshop, $g1participants, $g1expert);
}
else if ($nb_groups=="2"){
    $g1participants = $_POST['group1'];
    $g1expert = $_POST['group1expert'];
    createGroup($bdd, $id_workshop, $g1participants, $g1expert);
    $g2participants = $_POST['group2'];
    $g2expert = $_POST['group2expert'];
    createGroup($bdd, $id_workshop, $g2participants, $g2expert);
}
else if ($nb_groups=="3"){
    $g1participants = $_POST['group1'];
    $g1expert = $_POST['group1expert'];
    createGroup($bdd, $id_workshop, $g1participants, $g1expert);
    $g2participants = $_POST['group2'];
    $g2expert = $_POST['group2expert'];
    createGroup($bdd, $id_workshop, $g2participants, $g2expert);
    $g3participants = $_POST['group3'];
    $g3expert = $_POST['group3expert'];
    createGroup($bdd, $id_workshop, $g3participants, $g3expert);
}
else if ($nb_groups=="4"){
    $g1participants = $_POST['group1'];
    $g1expert = $_POST['group1expert'];
    createGroup($bdd, $id_workshop, $g1participants, $g1expert);
    $g2participants = $_POST['group2'];
    $g2expert = $_POST['group2expert'];
    createGroup($bdd, $id_workshop, $g2participants, $g2expert);
    $g3participants = $_POST['group3'];
    $g3expert = $_POST['group3expert'];
    createGroup($bdd, $id_workshop, $g3participants, $g3expert);
    $g4participants = $_POST['group4'];
    $g4expert = $_POST['group4expert'];
    createGroup($bdd, $id_workshop, $g4participants, $g4expert);
}


//Go back to the homepage
header('location: ../view/homepage.php');
/* amelie.piriou@gmail.com,javier.deolaneta@gmail.com,zhe.zhang@gmail.com */
