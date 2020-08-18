
<!DOCTYPE html>
<html>
<head>
    <div class="header"><img src="img\header.png"></div>
    <?php
    // We start the session (this is required in all pages of our member section)
    session_start ();
    include('../controller/import_models.php');
    include('menu_participant.php');?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/co_designworkshop.css"/>
</head>
<body>
</br></br>
<h2>Evaluate your Design Thinking workshop</h2>
</br>


<form action="\Cranfield-OLC-DT\controller\pa_evaluate.php" method="Post">
    <table>
        <tr>
            <td><h2 style="font-style: italic; font-size: 14px;">Evaluate the</h2></td>
            <td><h2 style="font-style: italic; font-size: 14px;">following  criteria using a scale from 1 to 5 – 5 being the highest grade</h2></td>
        </tr>
            <td>How the workshop was conducted</td>
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
            <td>The challenge level of the workshop</td>
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
            <td>To what extent were your expectation for this event met?</td>
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
            <td>To what extent were your expectation for this event met?</td>
            <td>
                <input type="radio" id="1" name="fourthcriteria" value=1>
                <label for="1">1</label>
                <input type="radio" id="2" name="fourthcriteria" value=2>
                <label for="2">2</label>
                <input type="radio" id="3" name="fourthcriteria" value=3>
                <label for="3">3</label>
                <input type="radio" id="4" name="fourthcriteria" value=4>
                <label for="4">4</label>
                <input type="radio" id="5" name="fourthcriteria" value=5>
                <label for="5">5</label>
            </td>
        </tr>
        <tr>
            <td>To what extent were your expectation for this event met?</td>
            <td>
                <input type="radio" id="1" name="fifthcriteria" value=1>
                <label for="1">1</label>
                <input type="radio" id="2" name="fifthcriteria" value=2>
                <label for="2">2</label>
                <input type="radio" id="3" name="fifthcriteria" value=3>
                <label for="3">3</label>
                <input type="radio" id="4" name="fifthcriteria" value=4>
                <label for="4">4</label>
                <input type="radio" id="5" name="fifthcriteria" value=5>
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
<input type="button" class="button" onclick=window.location.href="pa_attendworkshop.php" value="Go back" />
</body>
</html>


