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
function createWorkshop (PDO $bdd, $title, $start_date, $end_date, $goals, $id_coordinator, $id_judges, $id_technicians, $nb_groups, $status) {
    $statement = $bdd->prepare('INSERT INTO workshop(id_workshop, title, start_date, end_date, goals, id_coordinator, id_judges, id_technicians, nb_groups, status)
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
:status)');
    $statement->bindParam(":title", $title);
    $statement->bindParam(":start_date", $start_date);
    $statement->bindParam(":end_date", $end_date);
    $statement->bindParam(":goals", $goals);
    $statement->bindParam(":id_coordinator", $id_coordinator);
    $statement->bindParam(":id_judges", $id_judges);
    $statement->bindParam(":id_technicians", $id_technicians);
    $statement->bindParam(":nb_groups", $nb_groups);
    $statement->bindParam(":status", $status);
    $statement->execute();
}

function createGroup($bdd, $id_workshop, $id_participants, $id_expert) {
    $statement = $bdd->prepare('INSERT INTO workshop_group(id_group, id_workshop, id_participants, id_expert)
VALUES(
NULL,
:id_workshop, 
:id_participants,
:id_expert)');
    $statement->bindParam(":id_workshop", $id_workshop);
    $statement->bindParam(":id_participants", $id_participants);
    $statement->bindParam(":id_expert", $id_expert);
    $statement->execute();
}

/*function updateWorkshopGroupId ($bdd, $id_workshop, $id_g1, $id_g2, $id_g3, $id_g4) {
    $statement = $bdd->prepare('UPDATE workshop SET id_g1=:id_g1, id_g2=:id_g2, id_g3=:id_g3, id_g4=:id_g4  WHERE id_workshop=:id_workshop');
    $statement->bindParam(":id_workshop", $id_workshop);
    $statement->bindParam(":id_g1", $id_g1);
    $statement->bindParam(":id_g2", $id_g2);
    $statement->bindParam(":id_g3", $id_g3);
    $statement->bindParam(":id_g4", $id_g4);
    $statement->execute();
}*/


