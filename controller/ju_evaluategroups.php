<?php


//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}

include('../model/evaluation.php');

$id_workshop = $_SESSION['id_workshop'];
$id_group = $_GET['id'];
$status = 0;
$isEval = isGroupEvaluation($bdd, $id_workshop, $id_group, $status);

$_SESSION['id_group'] = $id_group;
$_SESSION['isEval'] = $isEval;
if ($isEval==1){
    $grade = getEval($bdd, $id_workshop, $id_group);
    $_SESSION['grade'] = $grade;
}

header('location: ../view/ju_evaluate.php');