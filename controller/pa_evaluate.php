<?php


//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}

include('../model/evaluation.php');

echo $id_workshop = $_SESSION['id_workshop'];
echo $id_group = $_SESSION['id_group'];
echo $id_stakeholder = $_SESSION['id'];
echo $first_criteria = $_POST['firstcriteria'];
echo $second_criteria = $_POST['secondcriteria'];
echo $third_criteria = $_POST['thirdcriteria'];
echo $text = $_POST['comments'];

createEvaluation($bdd, $id_workshop, $id_group, $id_stakeholder, $first_criteria, $second_criteria, $third_criteria, $text);

header('location: ../view/pa_evaluate.php');