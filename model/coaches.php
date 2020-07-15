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

//Function to display the list of coaches
function displayCoaches(PDO $bdd) {
    $response = $bdd->query('SELECT * FROM employee WHERE status=1');

// Display each coach info
    $tab=array();
    while ($data = $response->fetch()) {
        $tab[] = $data['firstname'];
        $tab[] = $data['surname'];
        $tab[] = $data['job'];
        $tab[] = $data['field'];
    }
    return $tab;
}

//Display the list of coaches
$tab = displayCoaches($bdd);

//If there is no session started yet, we start one
if (!isset($_SESSION)) {
    session_start();
}

//Add the list of coaches in a session variables
$_SESSION['tab'] = $tab;
