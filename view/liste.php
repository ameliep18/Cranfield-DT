<html>
<head>
    <title>Stock d'images</title>
</head>
<body>
<?php
include ("../model/connexion.php");
    $statement = $bdd->prepare('SELECT img_id, img_nom FROM images');
    $statement->execute();
    $col=array();
    while ($data = $statement->fetch()) {
        $col[] = $data['img_id'];
        $col[] = $data['img_nom'];
    }
    $imax = sizeof($col)/2;
    for ($i=0; $i<$imax; $i=$i+1) {
        echo "<a href=\"apercu.php?id=" . $col[$i+1] . "\">" . $col[$i] . "</a><br />";
    }
?>
</body>
</html>
