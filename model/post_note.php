<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=cranfield_old_dt;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

// Escaping the input data:
$id_activity = $_SESSION['id_activity3'];
$id_participant = $_SESSION['id'];
$author = $_POST['note-name'];
$body = $_POST['note-body'];
$color = $_POST['color'];
$xindex = random_int(50, 900);
$yindex = random_int(10, 50);
$zindex = (int)$_POST['zindex'];

/* Inserting a new record in the notes DB: */
$statement = $bdd->prepare('   INSERT INTO notes (id_activity, id_participant, text,name,color,xyz)
VALUES ("' . $id_activity . '","' . $id_participant . '","' . $body . '","' . $author . '","' . $color . '","' . $xindex . 'x' . $yindex . 'x' . $zindex . '")');
$statement->execute();

/*if(mysql_affected_rows($link)==1)
{
    // Return the id of the inserted row:
    echo mysql_insert_id($link);
}
else echo '0';