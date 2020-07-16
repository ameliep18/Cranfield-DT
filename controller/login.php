<?php

//Import the models
include('import_models.php');

/*if (isset($_POST['username']) && isset($_POST['password'])) {
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
} */

// We define the correct username and password to be able to connect
$bdd = new PDO('mysql:host=localhost;dbname=cranfield_old_dt;charset=utf8', 'root', '');

if (isset($_POST['username']) && isset($_POST['password'])) {
    //We get the user and his password
    $req = $bdd->prepare('SELECT id_stakeholder, firstname, surname, email, username, password, job, status FROM stakeholders WHERE username = :username');
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
        $_SESSION['id'] = $result['id_stakeholder'];
        $_SESSION['firstname'] = $result['firstname'];
        $_SESSION['surname'] = $result['surname'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['job'] = $result['job'];
        $_SESSION['status'] = $result['status'];


        // we redirect the user to his homepage
        header('location: ../view/homepage.php');
        echo 'You are connected!';
    }
    else {
        echo 'Wrong username or password!';
        header('location: ../index.php');
    }

}

