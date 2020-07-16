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
function createWorkshop (PDO $bdd, $title, $start_date, $end_date, $goals, $id_coordinator, $id_judges, $id_technicians, $nb_groups, $g1participants, $g1expert, $g2participants, $g2expert, $g3participants, $g3expert, $g4participants, $g4expert, $status) {
    $statement = $bdd->prepare('INSERT INTO workshop(id_workshop, title, start_date, end_date, goals, id_coordinator, id_judges, id_technicians, nb_groups, g1participants, g1expert, g2participants, g2expert, g3participants, g3expert, g4participants, g4expert, status)
VALUES(
NULL,
:title, 
:start_date,
:end_date, 
:goals, 
:id_coordinator, 
:id_judges,
:id_technicians,
:nb_groups,
:g1participants, 
:g1expert, 
:g2participants, 
:g2expert, 
:g3participants,
:g3expert,
:g4participants,
:g4expert,
:status)');
    $statement->bindParam(":title", $title);
    $statement->bindParam(":start_date", $start_date);
    $statement->bindParam(":end_date", $end_date);
    $statement->bindParam(":goals", $goals);
    $statement->bindParam(":id_coordinator", $id_coordinator);
    $statement->bindParam(":id_judges", $id_judges);
    $statement->bindParam(":id_technicians", $id_technicians);
    $statement->bindParam(":nb_groups", $nb_groups);
    $statement->bindParam(":g1participants", $g1participants);
    $statement->bindParam(":g1expert", $g1expert);
    $statement->bindParam(":g2participants", $g2participants);
    $statement->bindParam(":g2expert", $g2expert);
    $statement->bindParam(":g3participants", $g3participants);
    $statement->bindParam(":g3expert", $g3expert);
    $statement->bindParam(":g4participants", $g4participants);
    $statement->bindParam(":g4expert", $g4expert);
    $statement->bindParam(":status", $status);
    $statement->execute();
}




