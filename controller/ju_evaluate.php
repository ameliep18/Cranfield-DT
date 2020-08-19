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
$text = $_POST['comments'];

createEvaluation($bdd, $id_workshop, $id_group, $id_stakeholder, $first_criteria, $second_criteria, $third_criteria, 0, 0, 0, $text, 0);

header('location: ../view/ju_viewoutputs.php');
