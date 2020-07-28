
<!DOCTYPE html>
<html>
<head>
    <div class="header"><img src="img\header.png"></div>
    <?php
    // We start the session (this is required in all pages of our member section)
    session_start ();
    include('../controller/import_models.php');
    include('menu_coordinator.php');?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/co_designworkshop.css"/>
    <script>
        function myFunction() {
            var x = document.getElementById("nbgroup").value;
            var a1 = document.getElementById("group1");
            var a2 = document.getElementById("group2");
            var a3 = document.getElementById("group3");
            var a4 = document.getElementById("group4")
            var namea2 = document.getElementById("group2name");
            var namea3 = document.getElementById("group3name");
            var namea4 = document.getElementById("group4name");
            var expert2 = document.getElementById("group2expert");
            var expert3 = document.getElementById("group3expert");
            var expert4 = document.getElementById("group4expert");
            var nameexpert2 = document.getElementById("namegroup2expert");
            var nameexpert3 = document.getElementById("namegroup3expert");
            var nameexpert4 = document.getElementById("namegroup4expert");
            a2.style.display = "none";
            a3.style.display = "none";
            a4.style.display = "none";
            namea2.style.display = "none";
            namea3.style.display = "none";
            namea4.style.display = "none";
            expert2.style.display = "none";
            expert3.style.display = "none";
            expert4.style.display = "none";
            nameexpert2.style.display = "none";
            nameexpert3.style.display = "none";
            nameexpert4.style.display = "none";
            if (x=="1"){
                if (a1.style.display == "none") {
                    a1.style.display = "block";
                }
            }
            else if (x=="2"){
                if (a1.style.display == "none") {
                    a1.style.display = "block";
                }
                if (a2.style.display == "none") {
                    a2.style.display = "block";
                }
                namea2.style.display = "block";
                expert2.style.display = "block";
                nameexpert2.style.display = "block";
            }
            else if (x=="3"){
                if (a1.style.display == "none") {
                    a1.style.display = "block";
                }
                if (a2.style.display == "none") {
                    a2.style.display = "block";
                }
                if (a3.style.display == "none") {
                    a3.style.display = "block";
                }
                namea2.style.display = "block";
                namea3.style.display = "block";
                expert2.style.display = "block";
                expert3.style.display = "block";
                nameexpert2.style.display = "block";
                nameexpert3.style.display = "block";
            }
            else if (x=="4"){
                if (a1.style.display == "none") {
                    a1.style.display = "block";
                }
                if (a2.style.display == "none") {
                    a2.style.display = "block";
                }
                if (a3.style.display == "none") {
                    a3.style.display = "block";
                }
                if (a4.style.display == "none") {
                    a4.style.display = "block";
                }
                namea2.style.display = "block";
                namea3.style.display = "block";
                namea4.style.display = "block";
                expert2.style.display = "block";
                expert3.style.display = "block";
                expert4.style.display = "block";
                nameexpert2.style.display = "block";
                nameexpert3.style.display = "block";
                nameexpert4.style.display = "block";
            }
            else {
                a1.style.display = "none";
                a2.style.display = "none";
                a3.style.display = "none";
                a4.style.display = "none";
            }
            //document.getElementById("demo").innerHTML = x;
            //sessionStorage.setItem("nbgroup", x);
        }
    </script>
</head>
<body>
</br></br>
<h2>Design a new Design Thinking workshop</h2>
</br>
<form action="\Cranfield-OLC-DT\controller\co_designworkshop.php" method="Post">
    <table>
        <tr>
            <td>Title</td>
            <td>
                <input type="text" class="fields" name="title" required/>
            </td>
        </tr>
        <tr>
            <td>Start date</td>
            <td>
                <input type="datetime-local" class="fields" name="startdate" required/>
            </td>
        </tr>
        <tr>
            <td>End date</td>
            <td>
                <input type="datetime-local" class="fields" name="enddate" required/>
            </td>
        </tr>
        <tr>
            <td>Goals of the intended </br> innovative solution</td>
            <td>
                <textarea rows="3" class="fields" name="goals"></textarea>
            </td>
        </tr>
        <tr>
            <td>Judges</td>
            <td>
                <input type="checkbox" id="judge1" name="judge" value="<?php echo $_SESSION['tabJudges'][0];?>">
                <label for="judge1"><?php echo $_SESSION['tabJudges'][1];?></label>
                <input type="checkbox" id="judge2" name="judge" value="<?php echo $_SESSION['tabJudges'][3];?>">
                <label for="judge2"><?php echo $_SESSION['tabJudges'][4];?></label>
            </td>
        </tr>
        <tr>
            <td>Technicians</td>
            <td>
                <input type="checkbox" id="tech1" name="tech" value="<?php echo $_SESSION['tabTech'][0];?>">
                <label for="tech1"><?php echo $_SESSION['tabTech'][1];?></label>
                <input type="checkbox" id="tech2" name="tech" value="<?php echo $_SESSION['tabTech'][3];?>">
                <label for="tech2"><?php echo $_SESSION['tabTech'][4];?></label>
            </td>
        </tr>
        <tr>
            <td>Number of groups</td>
            <td>
                <select id="nbgroup" name="nbgroup" class="fields" onclick="myFunction()" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>First group participants' names, </br> separated by coma</td>
            <td><textarea rows="3" id="group1" name="group1" class="fields" style="display: block"> </textarea></td>
        </tr>
        <tr>
            <td>First group's  expert</td>
            <td>
                <select id="group1expert" name="group1expert" class="fields" style="display: block" required>
                    <?php
                    $imax = sizeof($_SESSION['tabExperts']);
                    for ($i=0; $i<$imax; $i=$i+3 ) { ?>
                        <option VALUE="<?php echo $_SESSION['tabExperts'][$i];?>">
                            <?php echo $_SESSION['tabExperts'][$i+1];?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> <span id="group2name" style="display: none"> Second group participants' names, </br> separated by coma </span> </td>
            <td><textarea rows="3" id="group2" name="group2" class="fields" style="display: none"> </textarea></td>
        </tr>
        <tr>
            <td> <span id="namegroup2expert" style="display: none"> Second group's expert </span></td>
            <td>
                <select id="group2expert" name="group2expert" class="fields" style="display: none" required>
                    <?php
                    $imax = sizeof($_SESSION['tabExperts']);
                    for ($i=0; $i<$imax; $i=$i+3 ) { ?>
                        <option VALUE="<?php echo $_SESSION['tabExperts'][$i];?>">
                            <?php echo $_SESSION['tabExperts'][$i+1];?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> <span id="group3name" style="display: none"> Third group participants' names, </br> separated by coma </span> </td>
            <td><textarea rows="3" id="group3" name="group3" class="fields" style="display: none"> </textarea></td>
        </tr>
        <tr>
            <td> <span id="namegroup3expert" style="display: none"> Third group's expert </span></td>
            <td>
                <select id="group3expert" name="group3expert" class="fields" style="display: none" required>
                    <?php
                    $imax = sizeof($_SESSION['tabExperts']);
                    for ($i=0; $i<$imax; $i=$i+3 ) { ?>
                        <option VALUE="<?php echo $_SESSION['tabExperts'][$i];?>">
                            <?php echo $_SESSION['tabExperts'][$i+1];?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> <span id="group4name" style="display: none"> Fourth group participants' names, </br> separated by coma </span> </td>
            <td><textarea rows="3" id="group4" name="group4" class="fields" style="display: none"> </textarea></td>
        </tr>
        <tr>
            <td> <span id="namegroup4expert" style="display: none"> Fourth group's expert </span></td>
            <td>
                <select id="group4expert" name="group4expert" class="fields" style="display: none" required>
                    <?php
                    $imax = sizeof($_SESSION['tabExperts']);
                    for ($i=0; $i<$imax; $i=$i+3 ) { ?>
                        <option VALUE="<?php echo $_SESSION['tabExperts'][$i];?>">
                            <?php echo $_SESSION['tabExperts'][$i+1];?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
    </table>
    <input type="submit" value="Create" />
</form>

</body>
<?php /*
$imax = sizeof($_SESSION['tabTech']);
for ($i=0; $i<$imax; $i=$i+3 ) { ?>
    <option VALUE="<?php echo $_SESSION['tabTech'][$i];?>">
        <?php echo $_SESSION['tabTech'][$i+1];?></option>
<?php } */?>
</html>
