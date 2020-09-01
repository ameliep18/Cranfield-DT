
<?php
// We start the session (this is required in all pages of our member section)
session_start ();?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php
    if ($_SESSION['status']==4) {
        include('menu_technician.php');
    }
    if ($_SESSION['status']==3) {
        include('menu_expert.php');
    }
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
    <link rel="stylesheet" type="text/css" href="css/homepage.css"/>
</head>


<body>
</br> </br></br> </br>
<h2>Hello <?php echo $_SESSION['firstname'];?> <?php echo $_SESSION['surname'];?>,</h2>
</br>
<h2>Welcome to the digitalised OLC Design Thinking platform!</h2>

</body>
</html>

