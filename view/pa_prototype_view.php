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

<form action="../controller/pa_prototype_upload.php" method="post" enctype="multipart/form-data">
    <h2 style="font-size: 14px">Select another image to upload:</h2></br>
    <input type="file" name="fileToUpload" id="fileToUpload"> </br>
    <input type="submit" value="Upload Image" name="submit">
</form>

</br> </br>
<div id="main">
    <?php
    $imax = sizeof($_SESSION['fileTab']);
    for ($i=1; $i<$imax; $i=$i+1 ) { ?>
    <div class="image"><img src="../<?php echo $_SESSION['fileTab'][$i]?>"></div>
        </br></br>
    <?php }?>
</div>
</body>
</html>
