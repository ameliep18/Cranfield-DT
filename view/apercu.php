<?php


if (isset($_GET['id'])) {
    echo $img_id = intval($_GET['id']);
    include("../model/connexion.php");
    $statement = $bdd->prepare('SELECT img_id, img_type, img_blob FROM images WHERE img_id=:img_id');
    $statement->bindParam(":img_id", $img_id);
    $statement->execute();
    $col=array();
    while ($data = $statement->fetch()) {
        $col[] = $data['img_id'];
        $col[] = $data['img_type'];
        $col[] = $data['img_blob'];
    }
    if (!$col[0]) {
        echo "Id d'image inconnu";
    } else {
        header ("Content-type: " . $col[1]);
        echo "<img src='$col[2]' >";
        echo "<br>";

    }

} else {
    echo "Mauvais id d'image";
}


