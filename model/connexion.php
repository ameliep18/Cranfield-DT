<?php

/*try {
    $bdd=new PDO('mysql:host=cranfield-olc.c60lgdcc53oj.us-east-2.rds.amazonaws.com;dbname=Cranfield_OLC;charset=utf8', 'admin', 'OLCcranfield&*');
}
catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}*/


try
{
    $bdd = new PDO('mysql:host=localhost:3306;dbname=cranfield_olc;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Error : ' . $e->getMessage());
}
//Collect all the contents of the table
$response = $bdd->query('SELECT firstname FROM employee WHERE status=1');

// Display each line of the employee table
while ($data = $response->fetch())
{
    echo $data['firstname'];
}

$response->closeCursor(); // End the request treatment*/
