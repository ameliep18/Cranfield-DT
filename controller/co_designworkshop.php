<?php


//Import the models
include('import_models.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}

//Allocate a value to each variable
$id_creator = $_SESSION['id'];
$title = $_POST['title'];
$start_date = $_POST['startdate'];
$end_date = $_POST['enddate'];
$goals = $_POST['goals'];
$id_judges = getIdFromName($bdd, $_POST['judges']);
$id_technicians = getIdFromName($bdd, $_POST['coachees'])[0];
$nb_groups = $_POST['nbgroup'];

if ($nb_groups=="1"){
    $g1participants = $_POST['group1'];
    $g1expert = $_POST['group1expert'];
    $g2participants = 0;
    $g2expert = 0;
    $g3participants = 0;
    $g3expert = 0;
    $g4participants = 0;
    $g4expert = 0;
}
else if ($nb_groups=="2"){
    $g1participants = $_POST['group1'];
    $g1expert = $_POST['group1expert'];
    $g2participants = $_POST['group2'];
    $g2expert = $_POST['group2expert'];
    $g3participants = 0;
    $g3expert = 0;
    $g4participants = 0;
    $g4expert = 0;
}
else if ($nb_groups=="3"){
    $g1participants = $_POST['group1'];
    $g1expert = $_POST['group1expert'];
    $g2participants = $_POST['group2'];
    $g2expert = $_POST['group2expert'];
    $g3participants = $_POST['group3'];
    $g3expert = $_POST['group3expert'];
    $g4participants = 0;
    $g4expert = 0;
}
else if ($nb_groups=="4"){
    $g1participants = $_POST['group1'];
    $g1expert = $_POST['group1expert'];
    $g2participants = $_POST['group2'];
    $g2expert = $_POST['group2expert'];
    $g3participants = $_POST['group3'];
    $g3expert = $_POST['group3expert'];
    $g4participants = $_POST['group4'];
    $g4expert = $_POST['group4expert'];
}

//Create the coaching in the database
createCoaching($bdd, $id_creator, $title, $start_date, $end_date, $goals, $id_judges, $id_technicians, $nb_groups, $g1participants, $g1expert, $g2participants, $g2expert, $g3participants, $g3expert, $g4participants, $g4expert);


//Go back to the homepage
header('location: ../view/homepage.php');
/* amelie.piriou@gmail.com,javier.deolaneta@gmail.com,zhe.zhang@gmail.com */
