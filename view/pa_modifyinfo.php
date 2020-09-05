<?php //Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php
    if ($_SESSION['status']==2) {
        include('menu_judge.php');
    }
    if ($_SESSION['status']==1) {
        include('menu_participant.php');
    }
    if ($_SESSION['status']==0) {
        include('menu_coordinator.php');
    }?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/co_designworkshop.css"/>
</head>
</br></br>
<body>
<h2>Modify my information</h2>
</br>
<form action="\Cranfield-OLC-DT\controller\pa_modifyinfo.php" method="Post">
    <table>
        <tr>
            <td>Email</td>
            <td>
                <input type="text" name="email" required/>
            </td>
        </tr>
        <tr>
            <td>Job</td>
            <td>
                <input type="text" name="job" required/>
            </td>
        </tr>
    </table>
    </br>
    <input type="submit" value="Submit" />
</form>
</br> </br>
<input type="button" class="button" onclick=window.location.href="../view/myprofile.php" value="Go back" />
</body>
</html>
