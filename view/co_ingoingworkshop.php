<!DOCTYPE html>
<head>
    <div class="header"><img src="img\header.png"></div>
    <?php
    ///Start the session if it's not already done
    if (!isset($_SESSION)) {
        session_start();
    }
    include('../controller/import_models.php');
    include('menu_coordinator.php');?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/co_ingoingworkshop.css"/>
</head>

<body>
</br></br>
<h2>In-going Workshops</h2>
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
        <th>Judges</th>
        <th>Technicians</th>
        <th>Number of group(s)</th>
        <th>First group's participants</th>
        <th>First group's expert</th>
        <th>Second group's participants</th>
        <th>Second group's expert</th>
        <th>Third group's participants</th>
        <th>Third group's expert</th>
        <th>Fourth group's participants</th>
        <th>Fourth group's expert</th>
    </tr>
    <?php
    $imax = sizeof($_SESSION['tabWorkshop']);

    for ($i=0; $i<$imax; $i=$i+17) {
        /*if ($_SESSION['tabWorkshop'][$i+8]==1) {
            //we stay like this
        }
        else if ($_SESSION['tabWorkshop'][$i+8]==2) { ?>
            <th>Second group's participants</th> <th>Second group's expert</th>
        <?php }
        else if ($_SESSION['tabWorkshop'][$i+8]==3) { ?>
            <th>Second group's participants</th> <th>Second group's expert</th>
            <th>Third group's participants</th> <th>Third group's expert</th>
        <?php }
        else if ($_SESSION['tabWorkshop'][$i+8]==4) { ?>
            <th>Second group's participants</th> <th>Second group's expert</th>
            <th>Third group's participants</th> <th>Third group's expert</th>
            <th>Fourth group's participants</th> <th>Fourth group's expert</th>
    </thead>
        <?php }*/?>

    <tbody> <!-- Content of the table -->
        <tr>
            <td><?php echo $_SESSION['tabWorkshop'][$i];?></td>
            <td><?php echo $_SESSION['tabWorkshop'][$i+1]; ?></td>
            <td><?php echo $_SESSION['tabWorkshop'][$i+2]; ?></td>
            <td><?php echo $_SESSION['tabWorkshop'][$i+3]; ?></td>
            <td><?php echo $_SESSION['tabWorkshop'][$i+4]; ?></td>
            <td><?php echo $_SESSION['tabWorkshop'][$i+5]; ?></td>
            <td><?php echo $_SESSION['tabWorkshop'][$i+6]; ?></td>
            <td><?php echo $_SESSION['tabWorkshop'][$i+7]; ?></td>
            <td><?php echo $_SESSION['tabWorkshop'][$i+8]; ?></td>
            <td><?php echo $_SESSION['tabWorkshop'][$i+9]; ?></td>
            <td><?php echo $_SESSION['tabWorkshop'][$i+10]; ?></td>
            <?php
            if ($_SESSION['tabWorkshop'][$i+8]==1) { ?>
                <td> – </td>
                <td> – </td>
                <td> – </td>
                <td> – </td>
                <td> – </td>
                <td> – </td>
            <?php }
            if ($_SESSION['tabWorkshop'][$i+8]==2) { ?>
                <td> <?php echo $_SESSION['tabWorkshop'][$i+11]; ?> </td>
                <td> <?php echo $_SESSION['tabWorkshop'][$i+12]; ?> </td>
                <td> – </td>
                <td> – </td>
                <td> – </td>
                <td> – </td>
                <?php
            }
            if ($_SESSION['tabWorkshop'][$i+8]==3) {?>
                <td> <?php echo $_SESSION['tabWorkshop'][$i+11]; ?> </td>
                <td> <?php echo $_SESSION['tabWorkshop'][$i+12]; ?> </td>
                <td> <?php echo $_SESSION['tabWorkshop'][$i+13]; ?> </td>
                <td> <?php echo $_SESSION['tabWorkshop'][$i+14]; ?> </td>
                <td> – </td>
                <td> – </td>
            <?php }
            if ($_SESSION['tabWorkshop'][$i+8]==4) {?>
                <td> <?php echo $_SESSION['tabWorkshop'][$i+11]; ?> </td>
                <td> <?php echo $_SESSION['tabWorkshop'][$i+12]; ?> </td>
                <td> <?php echo $_SESSION['tabWorkshop'][$i+13]; ?> </td>
                <td> <?php echo $_SESSION['tabWorkshop'][$i+14]; ?> </td>
                <td> <?php echo $_SESSION['tabWorkshop'][$i+15]; ?> </td>
                <td> <?php echo $_SESSION['tabWorkshop'][$i+16]; ?> </td>
            <?php }?>

        </tr>
    <?php } ?>
    </tbody>
</table>

</body>

<footer>

</footer>
