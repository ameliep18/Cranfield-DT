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
    <link rel="stylesheet" type="text/css" href="css/myprofile.css"/>
</head>

<body>
</br></br>
<h2>My profile</h2>
</br>
<div id="conteneur">
    <div class="info">
        <div class="inf"><h3>Personal information</h3></br>
        <Strong>ID: </Strong><?php echo $_SESSION['id']; ?> </br></br>
        <Strong>Firstname: </Strong><?php echo $_SESSION['firstname']; ?> </br></br>
        <Strong>Surname: </Strong><?php echo $_SESSION['surname']; ?> </br></br>
        <Strong>Email: </Strong><?php echo $_SESSION['email']; ?> </br></br>
        <Strong>Username: </Strong><?php echo $_SESSION['username']; ?> </br></br>
        <Strong>Job: </Strong><?php echo $_SESSION['job']; ?> </br></br>
        <Strong>Status: </Strong><?php
            if ($_SESSION['status']==4) {
                echo 'Technician';
            }
            if ($_SESSION['status']==3) {
                echo 'Expert';
            }
            if ($_SESSION['status']==2) {
                echo 'Judge';
            }
            if ($_SESSION['status']==1) {
                echo 'Participant';
            }
            if ($_SESSION['status']==0) {
                echo 'Coordinator';
            }?>
         </br>
        </br></br>
        </div>
        <input type="button" class="button" onclick=window.location.href="../view/modifypassword.php" value="Modify my password" />
    </div>

</div>

</body>
</html>