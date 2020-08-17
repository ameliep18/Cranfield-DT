
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

<h3 style="font-style:italic">Evaluate the following criteria using a scale from 1 to 5</h3>
</br></br>
<form action="\Cranfield-OLC-DT\controller\pa_evaluate.php" method="Post">
    <table>
        <tr>
            <td>First criteria</td>
            <td>
                <select id="firstcriteria" name="firstcriteria" class="fields"  required>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Second criteria</td>
            <td>
                <select id="secondcriteria" name="secondcriteria" class="fields" required>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Third criteria</td>
            <td>
                <select id="thirdcriteria" name="thirdcriteria" class="fields" required>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Comments</td>
            <td>
                <textarea rows="3" class="fields" name="comments"></textarea>
            </td>
        </tr>
    </table>
    <input type="submit" value="Create" />
</form>

</body>
</html>


