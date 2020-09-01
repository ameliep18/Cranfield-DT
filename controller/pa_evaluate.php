<?php
//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}

include('../model/evaluation.php');

$id_workshop = $_SESSION['id_workshop'];
$id_stakeholder = $_SESSION['id'];
$status = 1;
$isEval = isWorkshopEvaluation($bdd, $id_workshop, $id_stakeholder, $status);

$_SESSION['isEval'] = $isEval;

header('location: ../view/pa_evaluate.php');
