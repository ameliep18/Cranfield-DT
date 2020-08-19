<?php //Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}?>

<!DOCTYPE html>
<html>

<head>
    <div class="header"><img src="img\header.png"></div>
    <?php
    include('menu_judge.php');
    include('../model/evaluation.php')?>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/ju_viewoutputs.css"/>
</head>

<body>
</br></br>
<h2>Design Thinking Workshop : </br> <?php echo $_SESSION['title']; ?></h2>
</br>
<div id="conteneur">
    <div class="group1output">
        <h2>First group's final output</h2>
        <span> <Strong>Prototype: </Strong></span> </br></br><div class="output1"><img src="img\prototype.png"></div>  </br></br>
        <?php
        $j=0;
        $isEval = isGroupEvaluation($bdd, $_SESSION['id_workshop'], 1, 0);
        if ($isEval == 0) { ?>
            <input type="button" class="button" onclick=window.location.href="../controller/ju_evaluategroups?id=1" value="Evaluate this output" />
        <?php }
        else if ($isEval == 1) {
            $j++;
            $grade = getEval($bdd, $_SESSION['id_workshop'], 1);?>
            <Strong>Completed ! </Strong>
            </br> <Strong>Grade: <?php echo $grade;?>/15</Strong>
        <?php }?>

    </div>
    <div class="group2output">
        <h2>Second group's final output</h2>
        <span> <Strong>Prototype: </Strong> </span> </br></br><div class="output2"><img src="img\prototype.png"></div> </br></br>
        <?php
        $isEval = isGroupEvaluation($bdd, $_SESSION['id_workshop'], 1, 0);
        if ($isEval == 0) { ?>
            <input type="button" class="button" onclick=window.location.href="../controller/ju_evaluategroups?id=2" value="Evaluate this output" />
        <?php }
        else if ($isEval == 1) {
            $j++;
            $grade = getEval($bdd, $_SESSION['id_workshop'], 2);?>
            <Strong>Completed ! </Strong>
            </br> <Strong>Grade: <?php echo $grade;?>/15</Strong>
        <?php }?>
    </div>
    <div class="group3output">
        <h2>Third group's final output</h2>
        <span> <Strong>Prototype: </Strong> </span></br> </br><div class="output3"><img src="img\prototype.png"></div> </br></br>
        <?php
        $isEval = isGroupEvaluation($bdd, $_SESSION['id_workshop'], 1, 0);
        if ($isEval == 0) { ?>
            <input type="button" class="button" onclick=window.location.href="../controller/ju_evaluategroups?id=3" value="Evaluate this output" />
        <?php }
        else if ($isEval == 1) {
            $j++;
            $grade = getEval($bdd, $_SESSION['id_workshop'], 3);?>
            <Strong>Completed ! </Strong>
            </br> <Strong>Grade: <?php echo $grade;?>/15</Strong>
        <?php }?>
    </div>
    <div class="group4output">
        <h2>Fourth group's final output</h2>
        <span> <Strong>Prototype: </Strong> </span></br> </br><div class="output4"><img src="img\prototype.png"></div> </br></br>
        <?php
        $isEval = isGroupEvaluation($bdd, $_SESSION['id_workshop'], 1, 0);
        if ($isEval == 0) { ?>
            <input type="button" class="button" onclick=window.location.href="../controller/ju_evaluategroups?id=4" value="Evaluate this output" />
        <?php }
        else if ($isEval == 1) {
            $j++;
            $grade = getEval($bdd, $_SESSION['id_workshop'], 4);?>
            <Strong>Completed ! </Strong>
            </br> <Strong>Grade: <?php echo $grade;?>/15</Strong>
        <?php }?>
    </div>
</div>
</br> </br>
<input type="button" class="button" onclick=window.location.href="../controller/ju_igworkshop.php" value="Go back" />
</body>
</html>
