<?php

//Import the models
include('../model/display_workshop.php');
include('../model/stakeholders.php');
include('../model/prototype_images.php');

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}
$id_activity = $_SESSION['id_activity4'];
$id_group = $_SESSION['id_group'];

$target_dir = "C:/wamp64/www/Cranfield-OLC-DT/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$file = "uploads/".basename($_FILES["fileToUpload"]["name"]);
if (!isset ($_SESSION['fileTab'])) {
    $tab[] = array();
    $tab[] = $file;
    $_SESSION['fileTab'] = $tab;
}
else {
    $tab = $_SESSION['fileTab'];
    $tab[] = $file;
    $_SESSION['fileTab'] = $tab;
}

setActivityStatus($bdd, $id_activity, 1);

$img_nom = $_FILES["fileToUpload"]["name"];
$img_taille = $_FILES["fileToUpload"]["size"];
$img_type = $imageFileType;
$img_url = $file;

uploadImage($bdd, $img_nom, $img_taille, $img_type, $img_url, $id_group);
$img_id = getIdImagebyUrl($bdd, $img_url);
updateGroupOutput($bdd, $id_group, $img_id);

$url = getGroupImage($bdd, $id_group);
$_SESSION['output'] = $url;

header('location: ../view/pa_prototype_view.php');

/*transfert($bdd);
$img_id = getImgID($bdd, $id_group);
updateImgName($bdd, $img_id);
$_SESSION['img_id'] = $img_id;

function transfert(PDO $bdd){
    $ret        = false;
    //$img_blob   = '';
    //$img_taille = 0;
    //$img_type   = '';
    //$img_nom    = '';
    $taille_max = 250000;
    $ret        = is_uploaded_file($_FILES['fileToUpload']['tmp_name']);
    if (!$ret) {
        echo "Transfert problem";
        return false;
    } else {
        // Le fichier a bien été reçu
        $img_taille = $_FILES['fileToUpload']['size'];

        if ($img_taille > $taille_max) {
            echo "File is too large !";
            return false;
        }

        echo $img_type = $_FILES['fileToUpload']['type'];
        echo $img_nom  = $_FILES['fileToUpload']['name'];
        $img_desc = "";
        $img_blob = addslashes (file_get_contents ($_FILES['fileToUpload']['tmp_name']));
        $id_group = $_SESSION['id_group'];
        $statement = $bdd->prepare('INSERT INTO images(img_id, img_nom, img_taille, img_type, img_desc, img_blob, id_group)
VALUES(
NULL,
:img_nom,
:img_taille,
:img_type, 
:img_desc,
:img_blob,
:id_group)');
        $statement->bindParam(":img_nom", $img_nom);
        $statement->bindParam(":img_taille", $img_taille);
        $statement->bindParam(":img_type", $img_type);
        $statement->bindParam(":img_desc", $img_desc);
        $statement->bindParam(":img_blob", $img_blob);
        $statement->bindParam(":id_group", $id_group);
        $statement->execute();
        return true;
    }
}

function getImgID($bdd, $id_group) {
    $statement = $bdd->prepare('SELECT img_id FROM images WHERE id_group=:id_group');
    $statement->bindParam(":id_group", $id_group);
    $statement->execute();
    while ($data = $statement->fetch()) {
        $id = $data['img_id'];
    }
    return $id;
}

function updateImgName($bdd, $img_id) {
    $img_nom = "image".$img_id;
    $statement = $bdd->prepare('UPDATE images SET img_nom=:img_nom WHERE img_id=:img_id');
    $statement->bindParam(":img_id", $img_id);
    $statement->bindParam(":img_nom", $img_nom);
    $statement->execute();
}*/

//header('location: ../view/pa_prototype_view.php');