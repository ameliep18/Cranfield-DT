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
}*/

//Function to display the name of the user knowing his ID
function getNameFromId(PDO $bdd, $id) {
    $name_array = array();
    $statement = $bdd->prepare('SELECT firstname, surname FROM stakeholders WHERE id_stakeholder=:id');
    $statement->bindParam(":id", $id);
    $statement->execute();
    //$statement->fetchAll();
    while ($data = $statement->fetch()) {
        $name_array[] = $data['firstname'];
        $name_array[] = $data['surname'];
    }
    $fullname = implode(" ", $name_array);
return $fullname;
}
function getNamesFromId(PDO $bdd, $charId) {
    $name_array1 = array();
    $name_array2 = array();
    $name_array3 = array();
    $name_array4 = array();
    $tabId = explode(",", $charId);
    $firstId = $tabId[0];
    $secondId = $tabId[1];
    $thirdId = $tabId[2];
    $fourthId = $tabId[3];

    $statement = $bdd->prepare('SELECT firstname, surname FROM stakeholders WHERE id_stakeholder=:id');
    $statement->bindParam(":id", $firstId);
    $statement->execute();
    //$statement->fetchAll();
    while ($data = $statement->fetch()) {
        $name_array1[] = $data['firstname'];
        $name_array1[] = $data['surname'];
    }
    $fullname1 = implode(" ", $name_array1);

    $statement = $bdd->prepare('SELECT firstname, surname FROM stakeholders WHERE id_stakeholder=:id');
    $statement->bindParam(":id", $secondId);
    $statement->execute();
    //$statement->fetchAll();
    while ($data = $statement->fetch()) {
        $name_array2[] = $data['firstname'];
        $name_array2[] = $data['surname'];
    }
    $fullname2 = implode(" ", $name_array2);

    $statement = $bdd->prepare('SELECT firstname, surname FROM stakeholders WHERE id_stakeholder=:id');
    $statement->bindParam(":id", $thirdId);
    $statement->execute();
    //$statement->fetchAll();
    while ($data = $statement->fetch()) {
        $name_array3[] = $data['firstname'];
        $name_array3[] = $data['surname'];
    }
    $fullname3 = implode(" ", $name_array3);

    $statement = $bdd->prepare('SELECT firstname, surname FROM stakeholders WHERE id_stakeholder=:id');
    $statement->bindParam(":id", $fourthId);
    $statement->execute();
    //$statement->fetchAll();
    while ($data = $statement->fetch()) {
        $name_array4[] = $data['firstname'];
        $name_array4[] = $data['surname'];
    }
    $fullname4 = implode(" ", $name_array4);

    $tabfullname[] = $fullname1;
    $tabfullname[] = $fullname2;
    $tabfullname[] = $fullname3;
    $tabfullname[] = $fullname4;

    return $tabfullname;
}

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