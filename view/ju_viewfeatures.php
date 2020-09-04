<?php
//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php include('menu_judge.php');?>
    <?php include('../model/prototype_images.php');?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/pa_prototype.css" />
</head>

<body>
</br></br>
<h2>View features of group n°<?php echo $_SESSION['id_group']?> final output</h2>
</br></br>
<input type="button" class="button" onclick=window.location.href="../view/ju_viewoutputs.php" value="Go back" />
</br></br>


<?php
if (!isset($_SESSION['output'])) {
    $url = getGroupImage($bdd, $_SESSION['id_group']);
    $_SESSION['output'] = $url;
}?>

<div id="main">
    <div class="image"> <img src="../<?php echo $_SESSION['output']?>"> </div>
</div>


</body>
</html>
