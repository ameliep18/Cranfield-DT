<?php

// Validating the input data:
if (!is_numeric($_GET['id']) || !is_numeric($_GET['x']) || !is_numeric($_GET['y']) || !is_numeric($_GET['z']))
    die("0");

// Escaping:
$id = (int)$_GET['id'];
$x = (int)$_GET['x'];
$y = (int)$_GET['y'];
$z = (int)$_GET['z'];

// Saving the position and z-index of the note:
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cranfield_old_dt;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Error : ' . $e->getMessage());
}
$query = $bdd->prepare("UPDATE notes SET xyz='" . $x . "x" . $y . "x" . $z . "' WHERE id=" . $id);
$query->execute();

echo "1";