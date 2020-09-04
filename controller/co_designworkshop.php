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
$link = $_POST['link'];
$id_coordinator = $_SESSION['id'];
$id_judges = $_POST['judge'];
$id_technicians = $_POST['tech'];
$nb_groups = $_POST['nbgroup'];
$status = 1;

//Create the workshop in the database
createWorkshop($bdd, $title, $start_date, $end_date, $goals, $link, $id_coordinator, $id_judges, $id_technicians, $nb_groups, $status);

$id_workshop = getIdFromTitle($bdd,$title);

if ($nb_groups=="1"){
    $g1participants = $_POST['group1'];
    createParticipant($bdd, $id_workshop, $g1participants);
    $g1expert = $_POST['group1expert'];
    createGroup($bdd, $id_workshop, $g1participants, $g1expert, "");
    $id_group = getGroupIdFromParticipants($bdd, $g1participants);
    createWorkshopActivities($bdd, $id_workshop, $id_group);
    updateParticipantGroupId($bdd, $g1participants, $id_group);
}
else if ($nb_groups=="2"){
    $g1participants = $_POST['group1'];
    createParticipant($bdd, $id_workshop, $g1participants);
    $g1expert = $_POST['group1expert'];
    createGroup($bdd, $id_workshop, $g1participants, $g1expert, "");
    $id_group = getGroupIdFromParticipants($bdd, $g1participants);
    createWorkshopActivities($bdd, $id_workshop, $id_group);
    updateParticipantGroupId($bdd, $g1participants, $id_group);

    $g2participants = $_POST['group2'];
    createParticipant($bdd, $id_workshop, $g2participants);
    $g2expert = $_POST['group2expert'];
    createGroup($bdd, $id_workshop, $g2participants, $g2expert, "");
    $id_group = getGroupIdFromParticipants($bdd, $g2participants);
    createWorkshopActivities($bdd, $id_workshop, $id_group);
    updateParticipantGroupId($bdd, $g2participants, $id_group);
}
else if ($nb_groups=="3"){
    $g1participants = $_POST['group1'];
    createParticipant($bdd, $id_workshop, $g1participants);
    $g1expert = $_POST['group1expert'];
    createGroup($bdd, $id_workshop, $g1participants, $g1expert, "");
    $id_group = getGroupIdFromParticipants($bdd, $g1participants);
    createWorkshopActivities($bdd, $id_workshop, $id_group);
    updateParticipantGroupId($bdd, $g1participants, $id_group);

    $g2participants = $_POST['group2'];
    createParticipant($bdd, $id_workshop, $g2participants);
    $g2expert = $_POST['group2expert'];
    createGroup($bdd, $id_workshop, $g2participants, $g2expert, "");
    $id_group = getGroupIdFromParticipants($bdd, $g2participants);
    createWorkshopActivities($bdd, $id_workshop, $id_group);
    updateParticipantGroupId($bdd, $g2participants, $id_group);

    $g3participants = $_POST['group3'];
    createParticipant($bdd, $id_workshop, $g3participants);
    $g3expert = $_POST['group3expert'];
    createGroup($bdd, $id_workshop, $g3participants, $g3expert, "");
    $id_group = getGroupIdFromParticipants($bdd, $g3participants);
    createWorkshopActivities($bdd, $id_workshop, $id_group);
    updateParticipantGroupId($bdd, $g3participants, $id_group);
}
else if ($nb_groups=="4"){
    $g1participants = $_POST['group1'];
    createParticipant($bdd, $id_workshop, $g1participants);
    $g1expert = $_POST['group1expert'];
    createGroup($bdd, $id_workshop, $g1participants, $g1expert, "");
    $id_group = getGroupIdFromParticipants($bdd, $g1participants);
    createWorkshopActivities($bdd, $id_workshop, $id_group);
    updateParticipantGroupId($bdd, $g1participants, $id_group);

    $g2participants = $_POST['group2'];
    createParticipant($bdd, $id_workshop, $g2participants);
    $g2expert = $_POST['group2expert'];
    createGroup($bdd, $id_workshop, $g2participants, $g2expert, "");
    $id_group = getGroupIdFromParticipants($bdd, $g2participants);
    createWorkshopActivities($bdd, $id_workshop, $id_group);
    updateParticipantGroupId($bdd, $g2participants, $id_group);

    $g3participants = $_POST['group3'];
    createParticipant($bdd, $id_workshop, $g3participants);
    $g3expert = $_POST['group3expert'];
    createGroup($bdd, $id_workshop, $g3participants, $g3expert, "");
    $id_group = getGroupIdFromParticipants($bdd, $g3participants);
    createWorkshopActivities($bdd, $id_workshop, $id_group);
    updateParticipantGroupId($bdd, $g3participants, $id_group);

    $g4participants = $_POST['group4'];
    createParticipant($bdd, $id_workshop, $g4participants);
    $g4expert = $_POST['group4expert'];
    createGroup($bdd, $id_workshop, $g4participants, $g4expert, "");
    $id_group = getGroupIdFromParticipants($bdd, $g4participants);
    createWorkshopActivities($bdd, $id_workshop, $id_group);
    updateParticipantGroupId($bdd, $g4participants, $id_group);
}


//Go back to the homepage
//header('location: ../view/homepage.php');
/* amelie.piriou@gmail.com,javier.deolaneta@gmail.com,zhe.zhang@gmail.com */
