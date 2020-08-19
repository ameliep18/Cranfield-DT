<?php

//Connect to the database
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cranfield_old_dt;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Error : ' . $e->getMessage());
}

//Function to create a feedback in the database
function createEvaluation (PDO $bdd, $id_workshop, $id_group, $id_stakeholder, $first_criteria, $second_criteria, $third_criteria, $fourth_criteria, $fifth_criteria, $sixth_criteria, $text, $status) {
    $statement = $bdd->prepare('INSERT INTO feedback(id_feedback, id_workshop, id_group, id_stakeholder, first_criteria, second_criteria, third_criteria, fourth_criteria, fifth_criteria, sixth_criteria, text, status)
VALUES(
NULL,
:id_workshop, 
:id_group,
:id_stakeholder, 
:first_criteria, 
:second_criteria, 
:third_criteria,
:fourth_criteria, 
:fifth_criteria, 
:sixth_criteria,
:text,
:status)');
    $statement->bindParam(":id_workshop", $id_workshop);
    $statement->bindParam(":id_group", $id_group);
    $statement->bindParam(":id_stakeholder", $id_stakeholder);
    $statement->bindParam(":first_criteria", $first_criteria);
    $statement->bindParam(":second_criteria", $second_criteria);
    $statement->bindParam(":third_criteria", $third_criteria);
    $statement->bindParam(":fourth_criteria", $fourth_criteria);
    $statement->bindParam(":fifth_criteria", $fifth_criteria);
    $statement->bindParam(":sixth_criteria", $sixth_criteria);
    $statement->bindParam(":text", $text);
    $statement->bindParam(":status", $status);
    $statement->execute();
}

function isGroupEvaluation(PDO $bdd, $id_workshop, $id_group, $status) {
    $statement = $bdd->prepare('SELECT id_feedback FROM feedback WHERE (id_workshop=:id_workshop AND id_group=:id_group AND status=:status)');
    $statement->bindParam(":id_workshop", $id_workshop);
    $statement->bindParam(":id_group", $id_group);
    $statement->bindParam(":status", $status);
    $statement->execute();
    while ($data = $statement->fetch()) {
        $id_feedback = $data['id_feedback'];
    }
    if (!isset ($id_feedback)) {
        $isFeedback = 0;
    }
    else {
        $isFeedback = 1;
    }
    return $isFeedback;
}

function getEval(PDO $bdd, $id_workshop, $id_group) {
    $grade=0;
    $statement = $bdd->prepare('SELECT id_feedback, first_criteria, second_criteria, third_criteria FROM feedback WHERE (id_workshop=:id_workshop AND id_group=:id_group AND status=0)');
    $statement->bindParam(":id_workshop", $id_workshop);
    $statement->bindParam(":id_group", $id_group);
    $statement->execute();
    while ($data = $statement->fetch()) {
        $criteria[] = $data['first_criteria'];
        $criteria[] = $data['second_criteria'];
        $criteria[] = $data['third_criteria'];
        $grade = $criteria[0] + $criteria[1] + $criteria[2];
    }
    return $grade;
}