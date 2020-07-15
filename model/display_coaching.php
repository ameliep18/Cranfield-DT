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

//Function to display the list of coachings
function displayCoachings(PDO $bdd, $status) {
    $statement = $bdd->prepare('SELECT * FROM coaching WHERE status=:status');
    $statement->bindParam(":status", $status);
    $statement->execute();

// Display each coaching info
    $tab=array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_coaching'];
        $tab[] = $data['title'];
        $tab[] = $data['topic'];
        $tab[] = $data['description'];
        $tab[] = getNameFromId($bdd, $data['id_coach']);
        if ($data['id_coachee2']==0 && $data['id_coachee3']==0) {
            $tab[] = getNameFromId($bdd, $data['id_coachee1']);
            $tab[] = "";
            $tab[] = "";
        }
        else if ($data['id_coachee3']==0) {
            $tab[] = getNameFromId($bdd, $data['id_coachee1']);
            $tab[] = getNameFromId($bdd, $data['id_coachee2']);
            $tab[] = "";
        }
        else {
            $tab[] = getNameFromId($bdd, $data['id_coachee1']);
            $tab[] = getNameFromId($bdd, $data['id_coachee2']);
            $tab[] = getNameFromId($bdd, $data['id_coachee3']);
        }
    }
    return $tab;
}

//Function to display the requested coachings
function displayRequestedCoachings(PDO $bdd) {
    $statement = $bdd->prepare('SELECT * FROM coaching WHERE status=0');
    $statement->execute();

// Display each coaching info
    $tab=array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_coaching'];
        $tab[] = getNameFromId($bdd,$data['id_creator']);
        $tab[] = $data['topic'];
        $tab[] = $data['justification'];
    }
    return $tab;
}

//Function to display the requested coachings of one coach/coachee
function displayMyRequestedCoachings(PDO $bdd, $id, $status) {
    $statement = $bdd->prepare('SELECT * FROM coaching WHERE status=:status AND id_creator=:id');
    $statement->bindParam(":status", $status);
    $statement->bindParam(":id", $id);
    $statement->execute();

// Display each coaching info
    $tab=array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_coaching'];
        $tab[] = $data['topic'];
        $tab[] = $data['justification'];
    }
    return $tab;
}

//Function to display one requested coaching
function displayOneRequestedCoachings(PDO $bdd, $id) {
    $statement = $bdd->prepare('SELECT * FROM coaching WHERE status=0 AND id_coaching=:id');
    $statement->bindParam(":id", $id);
    $statement->execute();

// Display each coaching info
    $tab=array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['topic'];
        $tab[] = $data['justification'];
    }
    return $tab;
}

//Function to display one coaching title
function displayCoachingTitle(PDO $bdd, $id_coaching) {
    $statement = $bdd->prepare('SELECT title FROM coaching WHERE id_coaching=:id');
    $statement->bindParam(":id", $id_coaching);
    $statement->execute();

// Display each coaching info
    while ($data = $statement->fetch()) {
        $title = $data['title'];
    }
    return $title;
}

//Function to display one requested coaching
function displayOnePendingCoachings(PDO $bdd, $id) {
    $statement = $bdd->prepare('SELECT * FROM coaching WHERE status=3 AND id_coaching=:id');
    $statement->bindParam(":id", $id);
    $statement->execute();

// Display each coaching info
    $tab=array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_activities'];
        $tab[] = $data['start_date'];
        $tab[] = $data['end_date'];
    }
    return $tab;
}

//Function to update one requested coaching
function updateOneRequestedCoachings(PDO $bdd, $id, $topic, $justification) {
    $statement = $bdd->prepare('UPDATE coaching SET topic=:topic, justification=:justification WHERE id_coaching=:id; ');
    $statement->bindParam(":id", $id);
    $statement->bindParam(":topic", $topic);
    $statement->bindParam(":justification", $justification);
    $statement->execute();
}

//Function to display the in-going or delivered coachings of one coach/coachee
function displayMyCoachings(PDO $bdd, $id, $status)
{
    $statement = $bdd->prepare('SELECT * FROM coaching WHERE status=:status AND (id_coach=:id OR id_coachee1=:id OR id_coachee2=:id OR id_coachee3=:id)');
    $statement->bindParam(":id", $id);
    $statement->bindParam(":status", $status);
    $statement->execute();

// Display each coaching info
    $tab = array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_coaching'];
        $tab[] = $data['title'];
        $tab[] = $data['topic'];
        $tab[] = $data['description'];
        $tab[] = getNameFromId($bdd, $data['id_coach']);
        if ($data['id_coachee2'] == 0 && $data['id_coachee3'] == 0) {
            $tab[] = getNameFromId($bdd, $data['id_coachee1']);
            $tab[] = "";
            $tab[] = "";
        } else if ($data['id_coachee3'] == 0) {
            $tab[] = getNameFromId($bdd, $data['id_coachee1']);
            $tab[] = getNameFromId($bdd, $data['id_coachee2']);
            $tab[] = "";
        } else {
            $tab[] = getNameFromId($bdd, $data['id_coachee1']);
            $tab[] = getNameFromId($bdd, $data['id_coachee2']);
            $tab[] = getNameFromId($bdd, $data['id_coachee3']);
        }
    }
    return $tab;
}

//Function to update one pending coaching
function updateOnePendingCoachings(PDO $bdd, $id, $start_date, $end_date) {
    $statement = $bdd->prepare('UPDATE coaching SET start_date=:start_date, end_date=:end_date WHERE id_coaching=:id; ');
    $statement->bindParam(":id", $id);
    $statement->bindParam(":start_date", $start_date);
    $statement->bindParam(":end_date", $end_date);
    $statement->execute();
}

//Function to display the coachings ID of one coach/coachee
function displayMyCoachingsID(PDO $bdd, $id, $status)
{
    $statement = $bdd->prepare('SELECT id_coaching FROM coaching WHERE status=:status AND (id_coach=:id OR id_coachee1=:id OR id_coachee2=:id OR id_coachee3=:id)');
    $statement->bindParam(":id", $id);
    $statement->bindParam(":status", $status);
    $statement->execute();

// Display each coaching info
    $tab = array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_coaching'];
    }
    return $tab;
}

//Function to update one coaching status
function updateCoachingStatus(PDO $bdd, $id, $status) {
    $statement = $bdd->prepare('UPDATE coaching SET status=:status WHERE id_coaching=:id; ');
    $statement->bindParam(":id", $id);
    $statement->bindParam(":status", $status);
    $statement->execute();
}

//Function to update one coaching
function updateCoaching(PDO $bdd, $id_request, $title, $description, $goal, $id_coach, $id_coachee1, $id_coachee2, $id_coachee3, $time_alloc, $status) {
    $statement = $bdd->prepare('UPDATE coaching SET title=:title, description=:description, goal=:goal, id_coach=:id_coach, id_coachee1=:id_coachee1, id_coachee2=:id_coachee2, id_coachee3=:id_coachee3, time_alloc=:time_alloc, status=:status WHERE id_coaching=:id; ');
    $statement->bindParam(":id", $id_request);
    $statement->bindParam(":title", $title);
    $statement->bindParam(":description", $description);
    $statement->bindParam(":goal", $goal);
    $statement->bindParam(":id_coach", $id_coach);
    $statement->bindParam(":id_coachee1", $id_coachee1);
    $statement->bindParam(":id_coachee2", $id_coachee2);
    $statement->bindParam(":id_coachee3", $id_coachee3);
    $statement->bindParam(":time_alloc", $time_alloc);
    $statement->bindParam(":status", $status);
    $statement->execute();
}

function getIDcreator(PDO $bdd, $id_request){
    $statement = $bdd->prepare('SELECT id_creator FROM coaching WHERE id_coaching=:id');
    $statement->bindParam(":id", $id_request);
    $statement->execute();

    while ($data = $statement->fetch()) {
        $resp = $data['id_creator'];
    }
    return $resp;
}

function deleteCoaching(PDO $bdd, $id_request) {
    $statement = $bdd->prepare('DELETE FROM coaching WHERE id_coaching=:id');
    $statement->bindParam(":id", $id_request);
    $statement->execute();
}

function getCoachees(PDO $bdd, $id_coaching) {
    $statement = $bdd->prepare('SELECT id_coachee1, id_coachee2, id_coachee3 FROM coaching WHERE id_coaching=:id');
    $statement->bindParam(":id", $id_coaching);
    $statement->execute();

    $tab = array();
    $tabresult = array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_coachee1'];
        $tab[] = $data['id_coachee2'];
        $tab[] = $data['id_coachee3'];
    }
    if ($tab[1]==0) {
        $tabresult[] = $tab[0];
    }
    else if ($tab[1]!=0 && $tab[2]==0) {
        $tabresult[] = $tab[0];
        $tabresult[] = $tab[1];
    }
    else {
        $tabresult[] = $tab[0];
        $tabresult[] = $tab[1];
        $tabresult[] = $tab[2];
    }
    return $tabresult;
}