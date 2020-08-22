<?php //Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}
$id_activity=$_GET['id'];
$_SESSION['id_activity4'] = $id_activity?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php include('menu_participant.php');?>
    </br> </br>
    <?php include('pa_prototype_countdown.php');?>
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
    <h2 style="font-size: 14px">Select an image to upload:</h2></br>
    <input type="file" name="fileToUpload" id="fileToUpload"> </br>
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>
