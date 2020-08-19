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
    <link rel="stylesheet" type="text/css" href="css/pa_viewigworkshop.css"/>
</head>

<body>

</br></br>
<h2>My Design Thinking Workshop : </br> <?php echo $_SESSION['tabMyWorkshop'][1]; ?></h2>
<input type="button" class="button" onclick=window.location.href="../controller/pa_attendworkshop.php" value="Attend the workshop" />
</br> </br>
<div id="conteneur">
    <div class="workshop">
        <h3>Workshop's information</h3> </br>
        <Strong>Start date: </Strong> <?php echo $_SESSION['tabMyWorkshop'][2]; ?> <Strong>  End date: </Strong> <?php echo $_SESSION['tabMyWorkshop'][3]; ?> </br></br>
        <Strong>Goals: </Strong> <?php echo $_SESSION['tabMyWorkshop'][4]; ?> </br></br>
        <Strong>Coordinator: </Strong> <?php echo $_SESSION['tabMyWorkshop'][6]; ?> </br></br>
        <Strong>Judges: </Strong> Alan, Mary and Patrick </br></br>
        <Strong>Technician: </Strong> <?php echo $_SESSION['tabMyWorkshop'][8]; ?> </br></br>
        <Strong>Number of groups: </Strong> <?php echo $_SESSION['tabMyWorkshop'][9]; ?>
    </div>

    <div class="group">
        <h3>My group: Group 1</h3> </br>
        <Strong>Members: </Strong> <?php echo $_SESSION['tabMyGroup'][2][0]; ?>, </br><?php echo $_SESSION['tabMyGroup'][2][1]; ?>, </br> <?php echo $_SESSION['tabMyGroup'][2][2]; ?>, </br> <?php echo $_SESSION['tabMyGroup'][2][3]; ?>, </br><?php echo $_SESSION['tabMyGroup'][2][4]; ?>.</br></br>
        <Strong>Expert: </Strong><?php echo $_SESSION['tabMyGroup'][3]; ?>
    </div>
</div>

</body>
</html>
