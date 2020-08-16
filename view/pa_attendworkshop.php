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
<h3> <a href="https://teams.microsoft.com/l/channel/19%3a9bf500a72cb14178bb65a4f7be73dedc%40thread.tacv2/G%25C3%25A9n%25C3%25A9ral?groupId=97c64e90-aa10-4fe4-99e7-5de8186713c7&tenantId=31dca259-f714-4c48-ba5c-aa96dcf60aaa" target="_blank"> Access the Microsoft Teams global meeting </a>
</h3>

</br>
<div id="conteneur">
    <?php
    $imax = sizeof($_SESSION['tabActivities']);
    $j=1;
    for ($i=0; $i<$imax; $i=$i+6 ) {
        $id = $_SESSION['tabActivities'][$i];?>
        <div class="<?php echo strtolower($_SESSION['tabActivities'][$i+1]);?>">
        <h2><?php echo $j;?>. <?php echo $_SESSION['tabActivities'][$i+1];?></h2>
        <span> <Strong>Duration: </Strong> <?php echo $_SESSION['tabActivities'][$i+2];?></span> </br></br>
        <span> <Strong>Delivery method: </Strong> <?php echo $_SESSION['tabActivities'][$i+3];?></span> </br></br>
        <span> <Strong>Aim: </Strong><?php echo $_SESSION['tabActivities'][$i+4];?> </span> </br></br>
            <?php
            if ($_SESSION['tabActivities'][$i+1]=='Empathize') {
                if ($_SESSION['tabActivities'][$i+5] == 0) {
                    ?>
                    <input type="button" class="button"
                           onclick=window.location.href="pa_empathize_demo?id=<?php echo $id ?>" value="Start"/>
                <?php } else if ($_SESSION['tabActivities'][$i+5] == 1) { ?>
                    <link rel="stylesheet" type="text/css" href="css/attendworkshop_empathize.css"/>
                    <Strong>Completed ! </Strong>
                    <input type="button" class="button" onclick=window.location.href="pa_empathize_view" value="View output"/>
                <?php }
            }
            else if ($_SESSION['tabActivities'][$i+1]=='Define') {
                if ($_SESSION['tabActivities'][$i+5] == 0) {
                    ?>
                    <input type="button" class="button"
                           onclick=window.location.href="pa_define_demo?id=<?php echo $id ?>" value="Start"/>
                <?php } else if ($_SESSION['tabActivities'][$i + 5] == 1) { ?>
                    <link rel="stylesheet" type="text/css" href="css/attendworkshop_define.css"/>
                    <Strong>Completed ! </Strong>
                    <input type="button" class="button" onclick=window.location.href="pa_define_view" value="View output"/>
                <?php }
            }
            else if ($_SESSION['tabActivities'][$i+1]=='Ideate') {
                if ($_SESSION['tabActivities'][$i+5] == 0) {
                    ?>
                    <input type="button" class="button"
                           onclick=window.location.href="pa_ideate_demo?id=<?php echo $id ?>" value="Start"/>
                <?php } else if ($_SESSION['tabActivities'][$i + 5] == 1) { ?>
                    <link rel="stylesheet" type="text/css" href="css/attendworkshop_ideate.css"/>
                    <Strong>Completed ! </Strong>
                    <input type="button" class="button" onclick=window.location.href="pa_ideate_view" value="View output"/>
                <?php }
            }
            else if($_SESSION['tabActivities'][$i+1]=='Prototype') {
                if ($_SESSION['tabActivities'][$i+5] == 0) {
                    ?>
                    <input type="button" class="button"
                           onclick=window.location.href="pa_prototype?id=<?php echo $id ?>" value="Start"/>
                <?php } else if ($_SESSION['tabActivities'][$i+5] == 1) { ?>
                    <link rel="stylesheet" type="text/css" href="css/attendworkshop_prototype.css"/>
                    <Strong>Completed ! </Strong>
                    <input type="button" class="button" onclick=window.location.href="pa_prototype_view" value="View output"/>
                <?php }
            }
            else if($_SESSION['tabActivities'][$i+1]=='Test') {
                if ($_SESSION['tabActivities'][$i+5] == 0) {
                    ?>
                    <input type="button" class="button"
                           onclick=window.location.href="pa_test?id=<?php echo $id ?>" value="Start"/>
                <?php } else if ($_SESSION['tabActivities'][$i+5] == 1) { ?>
                    <link rel="stylesheet" type="text/css" href="css/attendworkshop_test.css"/>
                    <Strong>Completed ! </Strong>
                    <input type="button" class="button" onclick=window.location.href="pa_test_view" value="View output"/>
                <?php }
            }
            $j++ ?>
    </div>
    <?php
    }?>
</div>
</br> </br>
<input type="button" class="button" onclick=window.location.href="../controller/pa_viewigworkshop.php" value="Go back" />
</body>
</html>
<?php ?>