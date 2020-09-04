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

function getIdImagebyUrl($bdd, $img_url){
    $statement = $bdd->prepare('SELECT img_id FROM images WHERE img_url=:img_url');
    $statement->bindParam(":img_url", $img_url);
    $statement->execute();
    while ($data = $statement->fetch()) {
        $id = $data['img_id'];
    }
    return $id;
}

function updateGroupOutput($bdd, $id_group, $id_image) {
    $statement= $bdd->prepare("UPDATE workshop_group SET final_output=:id_image WHERE id_group=:id_group");
    $statement->bindParam(":id_image", $id_image);
    $statement->bindParam(":id_group", $id_group);
    $statement->execute();
}