<?php

//Connect to the database
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cranfield_olc;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Error : ' . $e->getMessage());
}

include ('employee.php');

//Function to create a coaching in the database
function createCoaching (PDO $bdd, $id_creator, $title, $topic, $description, $goal, $id_coach, $id_coachee1, $id_coachee2, $id_coachee3, $time_alloc, $id_activities, $start_date, $end_date, $status, $justification) {
    $statement = $bdd->prepare('INSERT INTO coaching(id_coaching, id_creator, title, topic, description, goal, id_coach, id_coachee1, id_coachee2, id_coachee3, time_alloc, id_activities, start_date, end_date, status, justification)
VALUES(
NULL,
:id_creator,
:title, 
:topic,
:description, 
:goal, 
:id_coach, 
:id_coachee1,
:id_coachee2,
:id_coachee3,
:time_alloc, 
:id_activities, 
:start_date, 
:end_date, 
:status,
:justification)');
    $statement->bindParam(":id_creator", $id_creator);
    $statement->bindParam(":title", $title);
    $statement->bindParam(":topic", $topic);
    $statement->bindParam(":description", $description);
    $statement->bindParam(":goal", $goal);
    $statement->bindParam(":id_coach", $id_coach);
    $statement->bindParam(":id_coachee1", $id_coachee1);
    $statement->bindParam(":id_coachee2", $id_coachee2);
    $statement->bindParam(":id_coachee3", $id_coachee3);
    $statement->bindParam(":time_alloc", $time_alloc);
    $statement->bindParam(":id_activities", $id_activities);
    $statement->bindParam(":start_date", $start_date);
    $statement->bindParam(":end_date", $end_date);
    $statement->bindParam(":status", $status);
    $statement->bindParam(":justification", $justification);
    $statement->execute();
}




