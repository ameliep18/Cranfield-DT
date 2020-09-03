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

function uploadImage($bdd, $img_nom, $img_taille, $img_type, $img_url, $id_group) {
    $statement = $bdd->prepare('INSERT INTO images(img_id, img_nom, img_taille, img_type, img_url, id_group)
VALUES(
NULL,
:img_nom,
:img_taille,
:img_type, 
:img_url,
:id_group)');
    $statement->bindParam(":img_nom", $img_nom);
    $statement->bindParam(":img_taille", $img_taille);
    $statement->bindParam(":img_type", $img_type);
    $statement->bindParam(":img_url", $img_url);
    $statement->bindParam(":id_group", $id_group);
    $statement->execute();
}

function getGroupImage($bdd, $id_group){
    $statement = $bdd->prepare('SELECT img_url FROM images WHERE id_group=:id_group');
    $statement->bindParam(":id_group", $id_group);
    $statement->execute();
    while ($data = $statement->fetch()) {
        $url = $data['img_url'];
    }
    return $url;
}

function updateGroupOutput($bdd, $id_group, $id_image) {
    $query = $bdd->prepare("UPDATE SET xyz='" . $x . "x" . $y . "x" . $z . "' WHERE id=" . $id);
    $query->execute();
}