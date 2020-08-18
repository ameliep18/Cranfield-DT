
<!DOCTYPE html>
<html>
<head>
    <div class="header"><img src="img\header.png"></div>
    <?php
    // We start the session (this is required in all pages of our member section)
    session_start ();
    include('../controller/import_models.php');
    include('menu_judge.php');?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/co_designworkshop.css"/>
</head>
<body>
<?php $id_group = $_GET['id']; ?>
</br></br>
<h2>Evaluate the group n°<?php echo $id_group?> final output</h2>
<td><h2 style="font-style: italic; font-size: 14px;">Evaluate the following  criteria using a scale from 1 to 5 – 5 being the highest grade</h2></td>
</br>
<form action="\Cranfield-OLC-DT\controller\ju_evaluate.php" method="Post">
    <table>
        <td>The extent to which the solution meets the goals</td>
        <td>
            <input type="radio" id="1" name="firstcriteria" value=1>
            <label for="1">1</label>
            <input type="radio" id="2" name="firstcriteria" value=2>
            <label for="2">2</label>
            <input type="radio" id="3" name="firstcriteria" value=3>
            <label for="3">3</label>
            <input type="radio" id="4" name="firstcriteria" value=4>
            <label for="4">4</label>
            <input type="radio" id="5" name="firstcriteria" value=5>
            <label for="5">5</label>
        </td>
        </tr>
        <tr>
            <td>Innovation level of the solution</td>
            <td>
                <input type="radio" id="1" name="secondcriteria" value=1>
                <label for="1">1</label>
                <input type="radio" id="2" name="secondcriteria" value=2>
                <label for="2">2</label>
                <input type="radio" id="3" name="secondcriteria" value=3>
                <label for="3">3</label>
                <input type="radio" id="4" name="secondcriteria" value=4>
                <label for="4">4</label>
                <input type="radio" id="5" name="secondcriteria" value=5>
                <label for="5">5</label>
            </td>
        </tr>
        <tr>
            <td>Level of ease to implement the solution in the organisation</td>
            <td>
                <input type="radio" id="1" name="thirdcriteria" value=1>
                <label for="1">1</label>
                <input type="radio" id="2" name="thirdcriteria" value=2>
                <label for="2">2</label>
                <input type="radio" id="3" name="thirdcriteria" value=3>
                <label for="3">3</label>
                <input type="radio" id="4" name="thirdcriteria" value=4>
                <label for="4">4</label>
                <input type="radio" id="5" name="thirdcriteria" value=5>
                <label for="5">5</label>
            </td>
        </tr>
        <tr>
            <td>Comments</td>
            <td>
                <textarea rows="3" class="fields" name="comments"></textarea>
            </td>
        </tr>
    </table>
    <input type="submit" value="Evaluate" />
</form>
</br></br>
<input type="button" class="button" onclick=window.location.href="ju_viewoutputs.php" value="Go back" />
</body>
</html>

