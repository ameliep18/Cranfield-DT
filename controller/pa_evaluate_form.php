<?php
//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}

include('../model/evaluation.php');

$id_workshop = $_SESSION['id_workshop'];
$id_group = $_SESSION['id_group'];
$id_stakeholder = $_SESSION['id'];
$first_criteria = $_POST['firstcriteria'];
$second_criteria = $_POST['secondcriteria'];
$third_criteria = $_POST['thirdcriteria'];
$fourth_criteria = $_POST['fourthcriteria'];
$fifth_criteria = $_POST['fifthcriteria'];
$sixth_criteria = $_POST['sixthcriteria'];
$text = $_POST['comments'];
$status = 0;

createEvaluation($bdd, $id_workshop, $id_group, $id_stakeholder, $first_criteria, $second_criteria, $third_criteria, $fourth_criteria, $fifth_criteria, $sixth_criteria, $text, $status);

header('location: ../view/pa_attendworkshop.php');