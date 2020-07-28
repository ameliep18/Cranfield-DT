<?php //Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php
        include('menu_participant.php');?>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/attendworkshop.css"/>
</head>

<body>
</br></br>
<h2>My Design Thinking Workshop : </br> <?php echo $_SESSION['tabMyWorkshop'][1]; ?></h2>
</br>
<div id="conteneur">
    <div class="empathize">
        <h2>1. EMPATHIZE</h2>
        <span> <Strong>Duration: </Strong> 30min</span> </br></br>
        <span> <Strong>Delivery method: </Strong> Zoom meeting</span> </br></br>
        <span> <Strong>Aim: </Strong> Understating people (users, customer and market) within the context of the challenge.</span> </br></br>
        <input type="button" class="button" onclick=window.location.href="" value="Start" />
    </div>
    <div class="define">
        <h2>2. DEFINE </h2>
        <span> <Strong>Duration: </Strong> 1 hour</span> </br></br>
        <span> <Strong>Delivery method: </Strong> Zoom meeting</span> </br></br>
        <span> <Strong>Aim: </Strong> Defining the challenge that needs to be addressed, based on the learnings from the previous step.</span> </br></br>
        <input type="button" class="button" onclick=window.location.href="" value="Start" />
    </div>
    <div class="ideate">
        <h2>3. IDEATE</h2>
        <span> <Strong>Duration: </Strong> 1 hour</span> </br></br>
        <span> <Strong>Delivery method: </Strong> Zoom meeting</span> </br></br>
        <span> <Strong>Aim: </Strong> Generating the widest range of ideas to explore the possibilities within design space envelope and beyond.</span> </br></br>
        <input type="button" class="button" onclick=window.location.href="" value="Start" />
    </div>
    <div class="prototype">
        <h2>4. PROTOTYPE</h2>
        <span> <Strong>Duration: </Strong> 1 hour</span> </br></br>
        <span> <Strong>Delivery method: </Strong> Zoom meeting</span> </br></br>
        <span> <Strong>Aim: </Strong> Generating different aspects of design intended to answer questions that move you closer to the final solution.</span> </br></br>
        <input type="button" class="button" onclick=window.location.href="" value="Start" />
    </div>
    <div class="test">
        <h2>5. TEST</h2>
        <span> <Strong>Duration: </Strong> 30 min</span> </br></br>
        <span> <Strong>Delivery method: </Strong> Zoom meeting</span> </br></br>
        <span> <Strong>Aim: </Strong> Obtaining feedback from users. Opportunity to deepen understanding of users and their needs.</span> </br></br>
        <input type="button" class="button" onclick=window.location.href="" value="Start" />
    </div>
</div>
</br> </br>
</body>
</html>
