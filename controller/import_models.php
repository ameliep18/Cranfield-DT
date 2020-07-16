<?php

if (!isset($_SESSION)) {
    session_start(); //commence une session si elle n'a pas été activée au préalable
}
//We include all the models
include('../model/design_workshop.php');
//include('../model/display_coaching.php');
include('../model/displayStakeholders.php');
//include('../model/activity.php');