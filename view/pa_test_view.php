<?php
//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
} ?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php include('menu_participant.php');?>
    <?php include('../model/evaluation.php');?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/pa_test.css" />
</head>

<body>
<?php
$feedback = getTest($bdd, $_SESSION['id_workshop'], $_SESSION['id_group']);
$_SESSION['feedback'] = $feedback;?>
</br></br>
<h2>5. Test: Communicate with other participants </br> or use an online testing tool</h2>
</br></br>
<input type="button" class="button" onclick=window.location.href="../controller/pa_attendworkshop.php" value="Go back" />
</br></br>
<h2 style="font-size: 16px"> Your feedback:</h2></br>
<span class="text"><?php echo $_SESSION['feedback'];?></span>
</body>
</html>