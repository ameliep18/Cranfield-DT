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
    <link rel="stylesheet" type="text/css" href="css/pa_ideate.css"/>
</head>

<body>
<div id="noteData"> <!-- Holds the form -->
    <form action="../controller/pa_empathize_post.php" method="post" class="note-form">

        <label for="note-body">Text of the note</label>
        <textarea name="note-body" id="note-body" class="pr-body" cols="30" rows="6"></textarea>

        <label for="note-name">Your name</label>
        <input type="text" name="note-name" id="note-name" class="pr-author" value="" />

<input type="submit" value="Create" />

</form>
</div>
<input type="button" class="button" onclick=window.location.href="pa_empathize_demo.php" value="Go back" />
</body>
