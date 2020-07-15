<?php
// Starting the session
session_start ();

// Destroying all the session variables
session_unset ();

// Destroying the session
session_destroy ();

// Redirecting the user to the login page
header ('location: ../index.php');
