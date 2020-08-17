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

//Function to create a coaching in the database
function createEvaluation (PDO $bdd, $id_workshop, $id_group, $id_stakeholder, $first_criteria, $second_criteria, $third_criteria, $text) {
    $statement = $bdd->prepare('INSERT INTO feedback(id_feedback, id_workshop, id_group, id_stakeholder, first_criteria, second_criteria, third_criteria, text)
VALUES(
NULL,
:id_workshop, 
:id_group,
:id_stakeholder, 
:first_criteria, 
:second_criteria, 
:third_criteria,
:text)');
    $statement->bindParam(":id_workshop", $id_workshop);
    $statement->bindParam(":id_group", $id_group);
    $statement->bindParam(":id_stakeholder", $id_stakeholder);
    $statement->bindParam(":first_criteria", $first_criteria);
    $statement->bindParam(":second_criteria", $second_criteria);
    $statement->bindParam(":third_criteria", $third_criteria);
    $statement->bindParam(":text", $text);
    $statement->execute();
}
