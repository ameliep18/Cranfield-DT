<?php //Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php
    include('menu_technician.php');?>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/tech_prototyping.css"/>
</head>

<body>
</br></br>
<h2>Design Thinking Workshop : </br> <?php echo $_SESSION['title']; ?></h2>

</br>
<h3> <a href="<?php echo $_SESSION['link']; ?>" target="_blank"> Access the Microsoft Teams global meeting </a></h3>
</br> </br>
<input type="button" class="button" onclick=window.location.href="../controller/expert_igworkshop.php" value="Go back" />
</body>
</html>

