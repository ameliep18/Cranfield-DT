<?php

//Import the models
include('import_models.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
    session_start();
    if ($_POST['username']=='coordinator') {
        $_SESSION['status'] = 0;
        header('location: ../view/homepage.php');
    }
    if ($_POST['username']=='participant') {
        $_SESSION['status'] = 1;
        header('location: ../view/homepage.php');
    }
    if ($_POST['username']=='judge') {
        $_SESSION['status'] = 2;
        header('location: ../view/homepage.php');
    }
    if ($_POST['username']=='expert') {
        $_SESSION['status'] = 3;
        header('location: ../view/homepage.php');
    }
    if ($_POST['username']=='technician') {
        $_SESSION['status'] = 4;
        header('location: ../view/homepage.php');
    }
}
else {
    echo 'Wrong username or password!';
    //header('location: ../index.php');
}
/*// We define the correct username and password to be able to connect
$bdd = new PDO('mysql:host=localhost;dbname=cranfield_olc;charset=utf8', 'root', '');

if (isset($_POST['username']) && isset($_POST['password'])) {
    //We get the user and his password
    $req = $bdd->prepare('SELECT id_employee, firstname, surname, email, username, password, job, field, status FROM employee WHERE username = :username');
    $username = $_POST['username'];
    $req->execute(array(
        'username' => $username));
    $result = $req->fetch();

    //We compare the password with the one inside the database
    if ($_POST['password']==$result['password']) {
        $isPasswordCorrect=true;
    }
    else {
        $isPasswordCorrect=false;
    }
}


if (!$result)
{
    echo 'Wrong username or password!';
}
else
{
    if ($isPasswordCorrect) {
        //we start the session
        session_start();
        // we keep the user parameters as session variables
        $_SESSION['id'] = $result['id_employee'];
        $_SESSION['firstname'] = $result['firstname'];
        $_SESSION['surname'] = $result['surname'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['job'] = $result['job'];
        $_SESSION['field'] = $result['field'];
        $_SESSION['status'] = $result['status'];


        // we redirect the user to his homepage
        if ($_SESSION['status']==1 || $_SESSION['status']==0) {
            $id_employee = $_SESSION['id'];
            $tabcoachingID = displayMyCoachingsID($bdd, $id_employee, 1);
            $_SESSION['tabcoachingID'] = $tabcoachingID;
            $imax = sizeof($tabcoachingID);
            for ($i=0; $i<$imax; $i++){
                $id_coaching = $tabcoachingID[$i];
                $tabActivities = displayActivities($bdd, $id_coaching);
                $_SESSION['tabActivities2'][$i] = $tabActivities;
            }
        }
        else {
            //Display the list of coaches
            $tab0 = displayRequestedCoachings($bdd);
            $_SESSION['tab0'] = $tab0;
        }

        header('location: ../view/homepage.php');
        echo 'You are connected!';
    }
    else {
        echo 'Wrong username or password!';
        //header('location: ../index.php');
    }

}*/

