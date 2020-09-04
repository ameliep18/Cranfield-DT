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
function createWorkshop (PDO $bdd, $title, $start_date, $end_date, $goals, $link, $id_coordinator, $id_judges, $id_technicians, $nb_groups, $status) {
    $statement = $bdd->prepare('INSERT INTO workshop(id_workshop, title, start_date, end_date, goals, link, id_coordinator, id_judges, id_technicians, nb_groups, status)
VALUES(
NULL,
:title, 
:start_date,
:end_date, 
:goals, 
:link,
:id_coordinator, 
:id_judges,
:id_technicians,
:nb_groups,
:status)');
    $statement->bindParam(":title", $title);
    $statement->bindParam(":start_date", $start_date);
    $statement->bindParam(":end_date", $end_date);
    $statement->bindParam(":goals", $goals);
    $statement->bindParam(":link", $link);
    $statement->bindParam(":id_coordinator", $id_coordinator);
    $statement->bindParam(":id_judges", $id_judges);
    $statement->bindParam(":id_technicians", $id_technicians);
    $statement->bindParam(":nb_groups", $nb_groups);
    $statement->bindParam(":status", $status);
    $statement->execute();
}

function createParticipant($bdd, $id_workshop, $participants) {
    $listparticipants = explode(',', $participants);
    $imax=sizeof($listparticipants);
    for ($i=0; $i<$imax; $i=$i+1) {
        $firstname = explode(' ', $listparticipants[$i])[0];
        $surname = explode(' ', $listparticipants[$i])[1];
        $email="";
        $username = strtolower($firstname .$surname);
        $password = strtolower($firstname .$surname);
        $job="";
        $id_group=0;
        $status=1;
        $statement = $bdd->prepare('INSERT INTO stakeholders(id_stakeholder, firstname, surname, email, username, password, job, id_workshop, id_group, status)
VALUES(
NULL,
:firstname,
:surname, 
:email,
:username,
:password,
:job,
:id_workshop,
:id_group,
:status)');
        $statement->bindParam(":firstname", $firstname);
        $statement->bindParam(":surname", $surname);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":job", $job);
        $statement->bindParam(":id_workshop", $id_workshop);
        $statement->bindParam(":id_group", $id_group);
        $statement->bindParam(":status", $status);
        $statement->execute();
    }

}

function createGroup($bdd, $id_workshop, $participants, $id_expert, $final_output) {
    $statement = $bdd->prepare('INSERT INTO workshop_group(id_group, id_workshop, id_participants, id_expert, final_output)
VALUES(
NULL,
:id_workshop, 
:id_participants,
:id_expert,
:final_output)');
    $id_participants = getIdListFromName($bdd, $participants);
    $statement->bindParam(":id_workshop", $id_workshop);
    $statement->bindParam(":id_participants", $id_participants);
    $statement->bindParam(":id_expert", $id_expert);
    $statement->bindParam(":final_output", $final_output);
    $statement->execute();
}

function getIdListFromName($bdd, $participantslist) {
    $list = explode(',', $participantslist);
    $imax=sizeof($list);
    for ($i=0; $i<$imax; $i=$i+1) {
        $firstname = explode(' ', $list[$i])[0];
        $surname = explode(' ', $list[$i])[1];
        $statement = $bdd->prepare('SELECT id_stakeholder FROM stakeholders WHERE (firstname=:firstname AND surname=:surname)');
        $statement->bindParam(":firstname", $firstname);
        $statement->bindParam(":surname", $surname);
        $statement->execute();
        while ($data = $statement->fetch()) {
            $id = $data['id_stakeholder'];
        }
        $finalList[$i] = $id;
    }
    $listVarchar = implode(',', $finalList);
    return $listVarchar;
}

function getIdRealListFromName($bdd, $participantslist) {
    $list = explode(',', $participantslist);
    $imax=sizeof($list);
    for ($i=0; $i<$imax; $i=$i+1) {
        $firstname = explode(' ', $list[$i])[0];
        $surname = explode(' ', $list[$i])[1];
        $statement = $bdd->prepare('SELECT id_stakeholder FROM stakeholders WHERE (firstname=:firstname AND surname=:surname)');
        $statement->bindParam(":firstname", $firstname);
        $statement->bindParam(":surname", $surname);
        $statement->execute();
        while ($data = $statement->fetch()) {
            $id = $data['id_stakeholder'];
        }
        $finalList[$i] = $id;
    }
    return $finalList;
}

function getGroupIdFromParticipants($bdd, $participants) {
    $id_participants = getIdListFromName($bdd, $participants);
    $statement = $bdd->prepare('SELECT id_group FROM workshop_group WHERE id_participants=:id_participants');
    $statement->bindParam(":id_participants", $id_participants);
    $statement->execute();
    while ($data = $statement->fetch()) {
        $id = $data['id_group'];
    }
    return $id;
}

function updateParticipantGroupId ($bdd, $participants, $id_group) {
    $id_participants = getIdRealListFromName($bdd, $participants);
    $imax=sizeof($id_participants);
    for ($i=0; $i<$imax; $i=$i+1) {
        $statement = $bdd->prepare('UPDATE stakeholders SET id_group=:id_group WHERE id_stakeholder=:id_stakeholder');
        $statement->bindParam(":id_stakeholder", $id_participants[$i]);
        $statement->bindParam(":id_group", $id_group);
        $statement->execute();
    }
}

function createWorkshopActivities($bdd, $id_workshop, $id_group) {
    $title[]='Empathize';
    $title[]='Define';
    $title[]='Ideate';
    $title[]='Prototype';
    $title[]='Test';
    $duration[] ="01:00:00";
    $duration[] ="01:30:00";
    $duration[] ="01:30:00";
    $duration[] ="02:00:00";
    $duration[] ="01:00:00";
    $com_method[] = "Empathy map";
    $com_method[] = "Persona and user story";
    $com_method[] = "Sticky notes ideation board";
    $com_method[] = "Online prototyping tool";
    $com_method[] = "Microsoft Teams meeting";
    $aim[] = "Understating people (users, customer and market) within the context of the challenge.";
    $aim[] = "Defining the challenge that needs to be addressed, based on the learnings from the previous step.";
    $aim[] = "Generating the widest range of ideas to explore the possibilities within design space envelope and beyond.";
    $aim[] = "Generating different aspects of design intended to answer questions that move you closer to the final solution.";
    $aim[] = "Obtaining feedback from users. Opportunity to deepen understanding of users and their needs.";
    $status = 0;
    $imax=5;
    for ($i=0; $i<$imax; $i=$i+1) {
        $statement = $bdd->prepare('INSERT INTO workshop_activity(id_activity, id_workshop, id_group, title, duration, com_method, aim, status)
VALUES(
NULL,
:id_workshop, 
:id_group,
:title,
:duration,
:com_method,
:aim,
:status)');
        $statement->bindParam(":id_workshop", $id_workshop);
        $statement->bindParam(":id_group", $id_group);
        $statement->bindParam(":title", $title[$i]);
        $statement->bindParam(":duration", $duration[$i]);
        $statement->bindParam(":com_method", $com_method[$i]);
        $statement->bindParam(":aim", $aim[$i]);
        $statement->bindParam(":status", $status);
        $statement->execute();
    }

}
