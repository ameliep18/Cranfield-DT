<?php

//Connect to the database
try
{
    $bdd2 = new PDO('mysql:host=localhost;dbname=cranfield_old_dt;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Error : ' . $e->getMessage());
}

//Function to display the list of coaches
function displayStakeholder(PDO $bdd2, $status) {
    $statement = $bdd2->prepare('SELECT * FROM stakeholders WHERE status=:status');
    $statement->bindParam(":status", $status);
    $statement->execute();
// Display each coach info
    $tab=array();
    while ($data = $statement->fetch()) {
        $tab[] = $data['id_stakeholder'];
        $tab[] = $data['firstname'];
        $tab[] = $data['surname'];
    }
    return $tab;
}

//Display the list of coaches
$tabJudges = displayStakeholder($bdd2, 2);
$tabExperts = displayStakeholder($bdd2, 3);
$tabTech = displayStakeholder($bdd2, 4);

//If there is no session started yet, we start one
if (!isset($_SESSION)) {
    session_start();
}

//Add the lists in session variables
$_SESSION['tabJudges'] = $tabJudges;
$_SESSION['tabTech'] = $tabTech;
$_SESSION['tabExperts'] = $tabExperts;

