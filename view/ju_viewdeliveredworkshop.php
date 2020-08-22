<?php //Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php include('menu_judge.php');?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/co_ingoingworkshop.css"/>
</head>

<body>
</br></br>
<h2>My Delivered Workshops</h2>
</br>

<table>
    <thead> <!-- Head of the table -->
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Goals</th>
        <th>Coordinator</th>
        <th>Technicians</th>
        <th>Number of group(s)</th>
    </tr>
    <?php
    $imax = sizeof($_SESSION['tabDWorkshops']);

    for ($i=0; $i<$imax; $i=$i+10) {
    ?>

    <tbody> <!-- Content of the table -->
    <tr>
        <td><?php echo $id = $_SESSION['tabDWorkshops'][$i];?></td>
        <td><?php echo $_SESSION['tabDWorkshops'][$i+1]; ?></td>
        <td><?php echo $_SESSION['tabDWorkshops'][$i+2]; ?></td>
        <td><?php echo $_SESSION['tabDWorkshops'][$i+3]; ?></td>
        <td><?php echo $_SESSION['tabDWorkshops'][$i+4]; ?></td>
        <td><?php echo $_SESSION['tabDWorkshops'][$i+6]; ?></td>
        <td><?php echo $_SESSION['tabDWorkshops'][$i+8]; ?></td>
        <td><?php echo $_SESSION['tabDWorkshops'][$i+9]; ?></td>
        <td class="button">
            <input type="button" onclick=window.location.href="../controller/ju_viewfinalwinningoutput?id=<?php echo $id?>" value="View" />
        </td>
    </tr>
    <?php } ?>

    </tbody>
</table>

</body>
</html>
