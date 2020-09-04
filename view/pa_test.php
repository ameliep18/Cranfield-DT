<?php //Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}
$id_activity=$_GET['id'];
$_SESSION['id_activity5'] = $id_activity?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php include('menu_participant.php');?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/pa_test.css" />
</head>

<body>
</br></br>
<h2>5.Test: Communicate with other participants </br> or use an online testing tool</h2>
</br></br>
<input type="button" class="button" onclick=window.location.href="../controller/pa_attendworkshop.php" value="Go back" />
</br></br>
<form action="../controller/pa_test_form.php" method="post">
    <h2 style="font-size: 14px"> Summarize your feedback:</h2></br>
    <textarea rows="10" class="fields" name="feedback"></textarea></br>
    <input type="submit" value="Submit" name="Submit">
</form>
</body>
</html>
