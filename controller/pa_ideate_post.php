<?php

//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}

include('../model/post_note.php');

header('location: ../view/pa_ideate_demo.php');