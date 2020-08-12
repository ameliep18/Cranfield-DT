<?php //Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php
    include('menu_judge.php');?>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/ju_viewoutputs.css"/>
</head>

<body>
</br></br>
<h2>Design Thinking Workshop : </br> <?php echo $_SESSION['title']; ?></h2>
</br>
<div id="conteneur">
    <div class="group1output">
        <h2>Final output v0</h2>
        <span> <Strong>Prototype: </Strong></span> </br></br><div class="output1"><img src="img\prototype.png"></div>  </br></br>
        <input type="button" class="button" onclick=window.location.href="" value="View features" />
    </div>
    <div class="group2output">
        <h2>Final output v1</h2>
        <span> <Strong>Prototype: </Strong> </span> </br></br><div class="output2"><img src="img\prototype.png"></div> </br></br>
        <input type="button" class="button" onclick=window.location.href="" value="View features" />
    </div>
    <div class="group3output">
        <h2>Final output v2</h2>
        <span> <Strong>Prototype: </Strong> </span></br> </br><div class="output3"><img src="img\prototype.png"></div> </br></br>
        <input type="button" class="button" onclick=window.location.href="" value="View features" />
    </div>
</div>
</br> </br>
<input type="button" class="button" onclick=window.location.href="../controller/ju_deliveredworkshop.php" value="Go back" />
</body>
</html>
