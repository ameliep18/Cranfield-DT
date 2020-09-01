<?php
echo '<link rel="stylesheet" type="text/css" href="C:/wamp64/www/OLC/view/menu_admin.css"/>';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/menu_coach.css"/>
</head>


<body>
<div id="menu">
    <ul>
        <li><a class="active" href="homepage.php">Home</a></li>
        <li><a href="#">My Design Thinking workshop</a>
            <ul>
                <li><a href="../controller/pa_viewigworkshop.php">Attend the Design Thinking workshop</a></li>
            </ul>
        </li>
        <li><a href="../view/myprofile.php">My Profile</a></li>
        <li style="float:right"><a href="../controller/logout.php">Log Out</a></li>
    </ul>
</div>
</body>
</html>
