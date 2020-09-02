<?php

/*try {
    $bdd=new PDO('mysql:host=cranfield-olc.c60lgdcc53oj.us-east-2.rds.amazonaws.com;dbname=Cranfield_OLC;charset=utf8', 'admin', 'OLCcranfield&*');
}
catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}*/


try
{
    $bdd = new PDO('mysql:host=localhost:3306;dbname=cranfield_old_dt;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Error : ' . $e->getMessage());
}

