<?php


//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}
//Import the models
include('../model/display_workshop.php');
include('../model/stakeholders.php');
include('../model/evaluation.php');

$id_workshop = $_SESSION['id_workshop'];
$id_activity = $_SESSION['id_activity5'];
$id_group = $_SESSION['id_group'];
$id_stakeholder = $_SESSION['id'];
$first_criteria = 0;
$second_criteria = 0;
$third_criteria = 0;
$fourth_criteria = 0;
$fifth_criteria = 0;
$sixth_criteria = 0;
$text = $_POST['feedback'];
$status = 2;

createEvaluation($bdd, $id_workshop, $id_group, $id_stakeholder, $first_criteria, $second_criteria, $third_criteria, $fourth_criteria, $fifth_criteria, $sixth_criteria, $text, $status);

setActivityStatus($bdd, $id_activity, 1);
header('location: ../view/pa_test_view.php');
