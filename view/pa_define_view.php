<?php //Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php include('menu_participant.php');?>
    <meta charset="utf-8" />

    <link rel="stylesheet" type="text/css" href="css/pa_define.css" />
    <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.2.6.css" media="screen" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="fancybox/jquery.fancybox-1.2.6.pack.js"></script>

    <script type="text/javascript" src="script.js"></script>
</head>

<body>
</br></br>
<h2>2. Define: Persona creation</h2>
</br></br>
<input type="button" class="button" onclick=window.location.href="pa_attendworkshop.php" value="Go back" />

<?php
if (!isset($_SESSION['id_activity2'])){
    $id_activity=$_GET['id'];
    $_SESSION['id_activity2']=$id_activity;
}
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cranfield_old_dt;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Error : ' . $e->getMessage());
}
$id_activity=$_SESSION['id_activity2'];
$query = $bdd->prepare("SELECT * FROM notes WHERE id_activity=:id_activity ORDER BY id_note DESC");
$query->bindParam(":id_activity", $id_activity);
$query->execute();
$notes = '';
$left='';
$top='';
$zindex='';
while($row= $query->fetch())
{
    // The xyz column holds the position and z-index in the form 200x100x10:
    list($left,$top,$zindex) = explode('x',$row['xyz']);
    $notes.= '
        <div class="note '.$row['color'].'" style="left:'.$left.'px;top:'.$top.'px;  z-index:'.$zindex.'">
        '.htmlspecialchars($row['text']).'
        <div class="author">'.htmlspecialchars($row['name']).'</div>
        <span class="data">'.$row['id_note'].'</span>
    </div>';
} ?>
</br> </br>

<div id="main">
    <div class="persona"><img src="img\persona4.png"></div>
    <?php echo $notes?>
</div>
</body>
