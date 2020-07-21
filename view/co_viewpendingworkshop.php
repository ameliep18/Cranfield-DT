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
    <link rel="stylesheet" type="text/css" href="css/viewpendingwokshop.css"/>
</head>

<body>
</br></br>
<h2>Pending workshop number <?php echo $_SESSION['id_workshop']; ?></h2>
</br>
<div id="conteneur">
    <div class="info">
<?php
$imax = sizeof($_SESSION['tabOneWorkshop']);

for ($i=0; $i<$imax; $i=$i+17) { ?>
    <strong>First group's participants</strong> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+9]; ?></td></br>
    </br><strong>First group's expert</strong> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+10]; ?></td>
<?php if ($_SESSION['tabOneWorkshop'][$i+8]==2) { ?>
        </br></br><strong>Second group's participants</strong> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+11]; ?></td></br>
    </br><strong>Second group's expert</strong> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+12]; ?></td>
<?php }
else if ($_SESSION['tabOneWorkshop'][$i+8]==3) { ?>
    </br></br><strong>Second group's participants</strong> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+11]; ?></td></br>
    </br><strong>Second group's expert</strong> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+12]; ?></td> </br></br>
    <strong>Third group's participants</strong> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+13]; ?></td></br>
    </br><strong>Third group's expert</strong> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+14]; ?></td>
<?php }
else if ($_SESSION['tabOneWorkshop'][$i+8]==4) { ?>
    </br></br><strong>Second group's participants</strong> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+11]; ?></td></br>
    </br><strong>Second group's expert</strong> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+12]; ?></td> </br></br>
    <strong>Third group's participants</strong> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+13]; ?></td> </br>
    </br><strong>Third group's expert</strong></br> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+14]; ?></td> </br></br>
    <strong>Fourth group's participants</strong> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+15]; ?></td> </br>
    </br><strong>Fourth group's expert</strong></br> : <td><?php echo $_SESSION['tabOneWorkshop'][$i+16]; ?></td>
<?php }
}?>
    </div>
</div>
</br> </br>
<input type="button" class="button" onclick=window.location.href="../controller/co_pendingworkshop.php" value="Go back" />
</body>
</html>
