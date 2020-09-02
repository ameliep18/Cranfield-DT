<?php
//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php include('menu_participant.php');?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/pa_prototype.css" />
</head>

<body>
</br></br>
<h2>4. Prototype: Insert images of your prototype</h2>
</br></br>
<input type="button" class="button" onclick=window.location.href="../controller/pa_attendworkshop.php" value="Go back" />
</br></br>

<!--<form action="../controller/pa_prototype_upload.php" method="post" enctype="multipart/form-data">
    <h2 style="font-size: 14px">Select another image to upload:</h2></br>
    <input type="file" name="fileToUpload" id="fileToUpload"> </br>
    <input type="submit" value="Upload Image" name="submit">
</form>!-->

</br> </br>
<!--<div id="main">
    <?php
    $imax = sizeof($_SESSION['fileTab']);
    for ($i=1; $i<$imax; $i=$i+1 ) { ?>
    <div class="image"><img src="../<?php echo $_SESSION['fileTab'][$i]?>"></div>
        </br></br>
    <?php }?>
</div>!-->

<?php if ( isset($_SESSION['img_id']) ){
    $img_id = intval ($_SESSION['img_id']);
    include ("../model/connexion.php");
    $statement = $bdd->prepare('SELECT img_id, img_type, img_blob FROM images WHERE img_id=:img_id');
    $statement->bindParam(":img_id", $img_id);
    $statement->execute();
    $tab=array();
    while ($data = $statement->fetch()) {
        $col[] = $data['img_id'];
        $col[] = $data['img_type'];
        $col[] = $data['img_blob'];
        echo "<a href=\"pa_prototype_viewpro.php?id=" . $col[1] . "\">" . $col[0] . "</a><br />";
    }
    if ( !$col[0] ){
        echo "Id d'image inconnu";
    } else { ?>
        <img src="pa_prototype_update.php?id=<?php echo $img_id?>" />
    <?php }

} else {
    echo "Mauvais id d'image";
} ?>
</body>
</html>
