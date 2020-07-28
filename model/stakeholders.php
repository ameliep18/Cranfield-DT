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

/*//Function to display the ID of the user knowing his name
function getIdFromName(PDO $bdd, $name) {
    $tab = explode(" ", $name);
    $firstname = $tab[0];
    $surname = $tab[1];
    $statement = $bdd->prepare('SELECT id_employee FROM employee WHERE firstname = :firstname AND surname = :surname');
    $statement->bindParam(":firstname", $firstname);
    $statement->bindParam(":surname", $surname);
    $statement->execute();
    //$statement->fetchAll();
    while ($data = $statement->fetch())
    {
        $id_array = $data['id_employee'];
    }
    //$id_string = implode(",", $id_array);
    return $id_array[0];
}

//Function to display the ID of the user knowing his email
function getIdFromEmail(PDO $bdd, $listemail) {
    $tab = explode(",", $listemail);
    $size = sizeof($tab);
    //echo $size;
    if ($size==3) {
        $firstmail = $tab[0];
        $secondmail = $tab[1];
        $thirdmail = $tab[2];
        $statement = $bdd->prepare('SELECT id_employee FROM employee WHERE email = :firstmail OR email = :secondmail OR email = :thirdmail ');
        $statement->bindParam(":firstmail", $firstmail);
        $statement->bindParam(":secondmail", $secondmail);
        $statement->bindParam(":thirdmail", $thirdmail);
    }
    if ($size==2) {
        $firstmail = $tab[0];
        $secondmail = $tab[1];
        $statement = $bdd->prepare('SELECT id_employee FROM employee WHERE email = :firstmail OR email = :secondmail');
        $statement->bindParam(":firstmail", $firstmail);
        $statement->bindParam(":secondmail", $secondmail);
    }
    if ($size==1){
        $firstmail = $tab[0];
        $statement = $bdd->prepare('SELECT id_employee FROM employee WHERE email = :firstmail');
        $statement->bindParam(":firstmail", $firstmail);
    }
    $statement->execute();
    //$statement->fetchAll();
    $id_array = array();
    while ($data = $statement->fetch())
    {
        $id_array[] = $data['id_employee'];
    }
    $id_array[]='0';
    $id_array[]='0';
    return $id_array;
}

//Function to display the name of the user knowing his ID
function getNameFromId(PDO $bdd, $id) {
    $name_array = array();
    $statement = $bdd->prepare('SELECT firstname, surname FROM employee WHERE id_employee=:id');
    $statement->bindParam(":id", $id);
    $statement->execute();
    //$statement->fetchAll();
    while ($data = $statement->fetch()) {
        $name_array[] = $data['firstname'];
        $name_array[] = $data['surname'];
    }
    $fullname = implode(" ", $name_array);
return $fullname;
}*/

function modifyPassword(PDO $bdd, $id, $newpassword) {
    $statement = $bdd->prepare('UPDATE stakeholders SET password=:password WHERE id_stakeholder=:id');
    $statement->bindParam(":id", $id);
    $statement->bindParam(":password", $newpassword);
    $statement->execute();
}

//Function to display the workshop ID of the user knowing his ID
function getWorkshopIdFromUserId(PDO $bdd, $id_participant) {

    $statement = $bdd->prepare('SELECT id_workshop FROM stakeholders WHERE id_stakeholder=:id');
    $statement->bindParam(":id", $id_participant);
    $statement->execute();
    while ($data = $statement->fetch()) {
        $id_workshop = $data['id_workshop'];
    }
    return $id_workshop;
}

function getGroupIdFromUserId(PDO $bdd, $id_participant) {

    $statement = $bdd->prepare('SELECT id_group FROM stakeholders WHERE id_stakeholder=:id');
    $statement->bindParam(":id", $id_participant);
    $statement->execute();
    while ($data = $statement->fetch()) {
        $id_group = $data['id_group'];
    }
    return $id_group;
}

//Function to split the participants' ID
function splitParticipants(PDO $bdd, $partlist) {
    $tab = explode(",", $partlist);
    $size = 4;
    //echo $size;
    if ($size==3) {
        $firstpart = $tab[0];
        $secondpart = $tab[1];
        $thirdpart = $tab[2];
        $fourthpart = $tab[3];
        $statement = $bdd->prepare('SELECT id_employee FROM employee WHERE email = :firstmail OR email = :secondmail OR email = :thirdmail ');
        $statement->bindParam(":firstmail", $firstmail);
        $statement->bindParam(":secondmail", $secondmail);
        $statement->bindParam(":thirdmail", $thirdmail);
    }
    $statement->execute();
    $id_array = array();
    while ($data = $statement->fetch())
    {
        $id_array[] = $data['id_employee'];
    }
    $id_array[]='0';
    $id_array[]='0';
    return $id_array;
}