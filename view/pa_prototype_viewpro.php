<?php

if ( isset($_GET['id']) ){
    $id = intval ($_GET['id']);
    include ("../model/connexion.php");
    $statement = $bdd->prepare('SELECT img_id, img_type, img_blob FROM images WHERE img_id=:img_id');
    $statement->bindParam(":img_id", $img_id);
    $statement->execute();
    while ($data = $statement->fetch()) {
        echo $col[] = $data['img_id'];
        echo $col[] = $data['img_type'];
        echo $col[] = $data['img_blob'];
    }
    if ( !$col[0] ){
        echo "Id d'image inconnu";
    } else {
        header ("Content-type: " . $col[1]);
        echo $col[2];
    }

} else {
    echo "Mauvais id d'image";
}

?>
