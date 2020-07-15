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

//Fonction to create an assessment in the database
function createAssessment (PDO $bdd, $id_activity, $Q1, $Q1C, $Q1A, $Q2, $Q2C, $Q2A, $Q3, $Q3C, $Q3A, $Q4, $Q4C, $Q4A, $Q5, $Q5C, $Q5A) {
    $statement = $bdd->prepare('INSERT INTO activity_assessment(id_assessment, id_activity, Q1, Q1_ac, Q1_a, Q2, Q2_ac, Q2_a, Q3, Q3_ac, Q3_a, Q4, Q4_ac, Q4_a, Q5, Q5_ac, Q5_a)
VALUES(
NULL,
:id_activity,
:Q1, 
:Q1C,
:Q1A, 
:Q2, 
:Q2C, 
:Q2A,
:Q3,
:Q3C,
:Q3A, 
:Q4, 
:Q4C, 
:Q4A, 
:Q5,
:Q5C,
:Q5A)');
    $statement->bindParam(":id_activity", $id_activity);
    $statement->bindParam(":Q1", $Q1);
    $statement->bindParam(":Q1C", $Q1C);
    $statement->bindParam(":Q1A", $Q1A);
    $statement->bindParam(":Q2", $Q2);
    $statement->bindParam(":Q2C", $Q2C);
    $statement->bindParam(":Q2A", $Q2A);
    $statement->bindParam(":Q3", $Q3);
    $statement->bindParam(":Q3C", $Q3C);
    $statement->bindParam(":Q3A", $Q3A);
    $statement->bindParam(":Q4", $Q4);
    $statement->bindParam(":Q4C", $Q4C);
    $statement->bindParam(":Q4A", $Q4A);
    $statement->bindParam(":Q5", $Q5);
    $statement->bindParam(":Q5C", $Q5C);
    $statement->bindParam(":Q5A", $Q5A);
    $statement->execute();
}

function displayAssessment (PDO $bdd, $id_activity) {
    $statement = $bdd->prepare('SELECT * FROM activity_assessment WHERE id_activity=:id');
    $statement->bindParam(":id", $id_activity);
    $statement->execute();

    $tab=array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_assessment'];
        $tab[] = $data['Q1'];
        $tab[] = $data['Q1_ac'];
        $tab[] = $data['Q1_a'];
        $tab[] = $data['Q2'];
        $tab[] = $data['Q2_ac'];
        $tab[] = $data['Q2_a'];
        $tab[] = $data['Q3'];
        $tab[] = $data['Q3_ac'];
        $tab[] = $data['Q3_a'];
        $tab[] = $data['Q4'];
        $tab[] = $data['Q4_ac'];
        $tab[] = $data['Q4_a'];
        $tab[] = $data['Q5'];
        $tab[] = $data['Q5_ac'];
        $tab[] = $data['Q5_a'];
    }
    return $tab;
}

function isAssessment(PDO $bdd, $id_activity) {
    $statement = $bdd->prepare('SELECT * FROM activity_assessment WHERE id_activity=:id');
    $statement->bindParam(":id", $id_activity);
    $statement->execute();

    while ($data = $statement->fetch()) {
        $id = $data['id_assessment'];
    }
    if (isset($id)) {
        $ans=1;
    }
    if (!isset($id)) {
        $ans=0;
    }
    return $ans;
}

function displayAllQuestions(PDO $bdd, $id_activity) {
    $statement = $bdd->prepare('SELECT * FROM activity_assessment WHERE id_activity=:id');
    $statement->bindParam(":id", $id_activity);
    $statement->execute();

    $tab=array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_assessment'];
        $tab[] = $data['Q1'];
        $tab[] = $data['Q2'];
        $tab[] = $data['Q3'];
        $tab[] = $data['Q4'];
        $tab[] = $data['Q5'];
    }
    return $tab;
}

function displayAllAnswers(PDO $bdd, $id_activity) {
    $statement = $bdd->prepare('SELECT * FROM activity_assessment WHERE id_activity=:id');
    $statement->bindParam(":id", $id_activity);
    $statement->execute();

    $tab=array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_assessment'];
        $tab[] = $data['Q1_a'];
        $tab[] = $data['Q2_a'];
        $tab[] = $data['Q3_a'];
        $tab[] = $data['Q4_a'];
        $tab[] = $data['Q5_a'];
    }
    return $tab;
}

function displayOneChoicesList(PDO $bdd, $id_activity, $nb) {
    $statement = $bdd->prepare('SELECT * FROM activity_assessment WHERE id_activity=:id');
    $statement->bindParam(":id", $id_activity);
    $statement->execute();

    $tab=array();
    $newtab=array();
    while ($data = $statement->fetch()) {
        if ($nb==1) {
            $tmp = $data['Q1_ac'];
        }
        if ($nb==2) {
            $tmp = $data['Q2_ac'];
        }
        if ($nb==3) {
            $tmp = $data['Q3_ac'];
        }
        if ($nb==4) {
            $tmp = $data['Q4_ac'];
        }
        if ($nb==5) {
            $tmp = $data['Q5_ac'];
        }
        $tab = explode(",", $tmp);
        $newtab[] = trim($tab[0]);
        $newtab[] = trim($tab[1]);
        $newtab[] = trim($tab[2]);
        $newtab[] = trim($tab[3]);
    }
    return $newtab;
}

function assessmentGrade($answers, $C1, $C2, $C3, $C4, $C5) {
    $tab = array();
    $tab[]=$C1;
    $tab[]=$C2;
    $tab[]=$C3;
    $tab[]=$C4;
    $tab[]=$C5;
    $grade=0;
    for ($i=0; $i<5; $i++) {
        if ($answers[$i+1]==$tab[$i]){
            $grade++;
        }
    }
    return $grade;
}

function createFeedback(PDO $bdd, $id_assessment, $id_coaching, $id_employee, $grade, $comment) {
    $statement = $bdd->prepare('INSERT INTO feedback(id_feedback, id_assessment, id_coaching, id_employee, grade, comment)
VALUES(
NULL,
:id_assessment,
:id_coaching,
:id_employee, 
:grade, 
:comment)');
    $statement->bindParam(":id_assessment", $id_assessment);
    $statement->bindParam(":id_coaching", $id_coaching);
    $statement->bindParam(":id_employee", $id_employee);
    $statement->bindParam(":grade", $grade);
    $statement->bindParam(":comment", $comment);
    $statement->execute();
}

function isGrade(PDO $bdd, $id_assessment, $id_employee) {
    $statement = $bdd->prepare('SELECT * FROM feedback WHERE id_assessment=:id_assessment AND id_employee=:id_employee');
    $statement->bindParam(":id_assessment", $id_assessment);
    $statement->bindParam(":id_employee", $id_employee);
    $statement->execute();

    while ($data = $statement->fetch()) {
        $id = $data['id_feedback'];
    }
    if (isset($id)) {
        $ans=1;
    }
    if (!isset($id)) {
        $ans=0;
    }
    return $ans;
}

function displayGrade(PDO $bdd, $id_assessment, $id_employee) {
    $statement = $bdd->prepare('SELECT * FROM feedback WHERE id_assessment=:id_assessment AND id_employee=:id_employee');
    $statement->bindParam(":id_assessment", $id_assessment);
    $statement->bindParam(":id_employee", $id_employee);
    $statement->execute();

    while ($data = $statement->fetch()) {
        $grade = $data['grade'];
    }
    return $grade;
}

function getIDAssessment($bdd, $id_activity) {
    $statement = $bdd->prepare('SELECT * FROM activity_assessment WHERE id_activity=:id_activity');
    $statement->bindParam(":id_activity", $id_activity);
    $statement->execute();

    while ($data = $statement->fetch()) {
        $id = $data['id_assessment'];
    }
    return $id;
}

function displayGradeEmployee(PDO $bdd, $id_assessment, $id_employee) {
    $statement = $bdd->prepare('SELECT id_employee, grade FROM feedback WHERE id_assessment=:id_assessment AND id_employee=:id_employee');
    $statement->bindParam(":id_assessment", $id_assessment);
    $statement->bindParam(":id_employee", $id_employee);
    $statement->execute();

    $tab = array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_employee'];
        $tab[] = displayNameFromID($bdd, $id_employee);
        $tab[] = $data['grade'];
    }
    return $tab;
}

function displayNameFromID (PDO $bdd, $id_employee) {
    $statement = $bdd->prepare('SELECT firstname, surname FROM employee WHERE id_employee=:id_employee');
    $statement->bindParam(":id_employee", $id_employee);
    $statement->execute();

    $tab = array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['firstname'];
        $tab[] = $data['surname'];
    }
    $name = implode(" ", $tab);
    return $name;
}

function ecertificationGrade($C1, $C2, $C3, $C4, $C5, $C6, $C7, $C8, $C9, $C10) {
    $answers = array();
    $answers[]='Q1c1';
    $answers[]='Q2c1';
    $answers[]='Q3c1';
    $answers[]='Q4c2';
    $answers[]='Q5c3';
    $answers[]='Q6c4';
    $answers[]='Q7c1';
    $answers[]='Q8c3';
    $answers[]='Q9c5';
    $answers[]='Q10c2';
    $tab = array();
    $tab[]=$C1;
    $tab[]=$C2;
    $tab[]=$C3;
    $tab[]=$C4;
    $tab[]=$C5;
    $tab[]=$C6;
    $tab[]=$C7;
    $tab[]=$C8;
    $tab[]=$C9;
    $tab[]=$C10;
    $grade=0;
    for ($i=0; $i<10; $i++) {
        if ($answers[$i]==$tab[$i]){
            $grade++;
        }
    }
    return $grade;
}

function isCoach(PDO $bdd, $id_coach) {
    $comment = 'E-certification assessment grade';
    $statement = $bdd->prepare('SELECT * FROM feedback WHERE id_employee=:id_coach AND comment=:comment');
    $statement->bindParam(":id_coach", $id_coach);
    $statement->bindParam(":comment", $comment);
    $statement->execute();

    while ($data = $statement->fetch()) {
        $id = $data['id_feedback'];
    }
    if (isset($id)) {
        $ans=1;
    }
    if (!isset($id)) {
        $ans=0;
    }
    return $ans;
}

function displayECertGrade(PDO $bdd, $id_coach) {
    $comment = 'E-certification assessment grade';
    $statement = $bdd->prepare('SELECT * FROM feedback WHERE comment=:comment AND id_employee=:id_coach');
    $statement->bindParam(":id_coach", $id_coach);
    $statement->bindParam(":comment", $comment);
    $statement->execute();

    while ($data = $statement->fetch()) {
        $grade = $data['grade'];
    }
    return $grade;
}

function updateAssessment (PDO $bdd, $id_activity, $Q1, $Q1C, $Q1A, $Q2, $Q2C, $Q2A, $Q3, $Q3C, $Q3A, $Q4, $Q4C, $Q4A, $Q5, $Q5C, $Q5A) {
        $statement = $bdd->prepare('UPDATE activity_assessment SET Q1=:Q1, Q1_ac=:Q1C, Q1_a=:Q1A, Q2=:Q2, Q2_ac=:Q2C, Q2_a=:Q2A, Q3=:Q3, Q3_ac=:Q3C, Q3_a=:Q3A, Q4=:Q4, Q4_ac=:Q4C, Q4_a=:Q4A, Q5=:Q5, Q5_ac=:Q5C, Q5_a=:Q5A WHERE id_activity=:id_activity');
        $statement->bindParam(":id_activity", $id_activity);
        $statement->bindParam(":Q1", $Q1);
        $statement->bindParam(":Q1C", $Q1C);
        $statement->bindParam(":Q1A", $Q1A);
        $statement->bindParam(":Q2", $Q2);
        $statement->bindParam(":Q2C", $Q2C);
        $statement->bindParam(":Q2A", $Q2A);
        $statement->bindParam(":Q3", $Q3);
        $statement->bindParam(":Q3C", $Q3C);
        $statement->bindParam(":Q3A", $Q3A);
        $statement->bindParam(":Q4", $Q4);
        $statement->bindParam(":Q4C", $Q4C);
        $statement->bindParam(":Q4A", $Q4A);
        $statement->bindParam(":Q5", $Q5);
        $statement->bindParam(":Q5C", $Q5C);
        $statement->bindParam(":Q5A", $Q5A);
        $statement->execute();
}