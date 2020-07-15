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

//Function to display the list of activities of a coaching
 function displayActivities ($bdd, $id) {
     $statement = $bdd->prepare('SELECT * FROM coaching_activity WHERE id_coaching=:id');
     $statement->bindParam(":id", $id);
     $statement->execute();

// Display each coaching info
     $tab = array();
     while ($data = $statement->fetch()) {
         $tab[] = $data['id_activity'];
         $tab[] = $data['title'];
         $tab[] = $data['description'];
         $tab[] = $data['com_method'];
         $tab[] = $data['start_date'];
         $tab[] = $data['end_date'];
         $tab[] = $data['status'];
         $tab[] = $data['link'];
     }
     return $tab;
 }

function displayIDActivities ($bdd, $id_coaching) {
    $statement = $bdd->prepare('SELECT id_activity FROM coaching_activity WHERE id_coaching=:id');
    $statement->bindParam(":id", $id_coaching);
    $statement->execute();

// Display each coaching info
    $tab = array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_activity'];
    }
    return $tab;
}

function createActivity (PDO $bdd, $id_coaching, $title, $description, $com_method, $link, $mm, $start_date, $end_date, $status) {
    $statement = $bdd->prepare('INSERT INTO coaching_activity(id_activity, id_coaching, title, description, com_method, link, meeting_minutes, start_date, end_date, status)
VALUES(
NULL,
:id_coaching,
:title, 
:description, 
:com_method, 
:link,
:meeting_minutes,
:start_date, 
:end_date, 
:status)');
    $statement->bindParam(":id_coaching", $id_coaching);
    $statement->bindParam(":title", $title);
    $statement->bindParam(":description", $description);
    $statement->bindParam(":com_method", $com_method);
    $statement->bindParam(":link", $link);
    $statement->bindParam(":meeting_minutes", $mm);
    $statement->bindParam(":start_date", $start_date);
    $statement->bindParam(":end_date", $end_date);
    $statement->bindParam(":status", $status);
    $statement->execute();
}

function displayOneActivity ($bdd, $id) {
    $statement = $bdd->prepare('SELECT * FROM coaching_activity WHERE id_activity=:id');
    $statement->bindParam(":id", $id);
    $statement->execute();

// Display each coaching info
    $tab = array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['title'];
        $tab[] = $data['description'];
        $tab[] = $data['com_method'];
        $tab[] = $data['start_date'];
        $tab[] = $data['end_date'];
        $tab[] = $data['link'];
    }
    return $tab;
}

function updateActivity(PDO $bdd, $id, $title, $description, $com_method, $link, $start_date, $end_date) {
    $statement = $bdd->prepare('UPDATE coaching_activity SET title=:title, description=:description, com_method=:com_method, link=:link, start_date=:start_date, end_date=:end_date WHERE id_activity=:id ');
    $statement->bindParam(":id", $id);
    $statement->bindParam(":title", $title);
    $statement->bindParam(":description", $description);
    $statement->bindParam(":com_method", $com_method);
    $statement->bindParam(":link", $link);
    $statement->bindParam(":start_date", $start_date);
    $statement->bindParam(":end_date", $end_date);
    $statement->execute();
}

function addMM (PDO $bdd, $id_activity, $mm) {
    $statement = $bdd->prepare('UPDATE coaching_activity SET meeting_minutes=:mm WHERE id_activity=:id');
    $statement->bindParam(":id", $id_activity);
    $statement->bindParam(":mm", $mm);
    $statement->execute();
}

function isMM (PDO $bdd, $id_activity){
    $statement = $bdd->prepare('SELECT meeting_minutes FROM coaching_activity WHERE id_activity=:id_activity');
    $statement->bindParam(":id_activity", $id_activity);
    $statement->execute();

    while ($data = $statement->fetch()) {
        $mm = $data['meeting_minutes'];
    }
    if ($mm=="") {
        $ans=0;
    }
    else {
        $ans=1;
    }
    return $ans;
}

function displayMM (PDO $bdd, $id_activity) {
    $statement = $bdd->prepare('SELECT meeting_minutes FROM coaching_activity WHERE id_activity=:id');
    $statement->bindParam(":id", $id_activity);
    $statement->execute();

// Display each coaching info
    while ($data = $statement->fetch()) {
        $mm = $data['meeting_minutes'];
    }
    return $mm;
}