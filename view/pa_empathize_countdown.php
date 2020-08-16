<?php
//Start the session if it's not already done
if (!isset($_SESSION)) {
    session_start();
}
/*---------------------------------------------------------------*/
/*
    Titre : Compte &agrave; rebours en JavaScript et PHP

    URL   : https://phpsources.net/code_s.php?id=493
    Auteur           : KOogar
    Date édition     : 01 Fév 2009
    Date mise à jour : 19 Aout 2019
    Rapport de la maj:
    - fonctionnement du code vérifié
*/
/*---------------------------------------------------------------*/

/*******************************************************************************
 * A parametrer
 ***************************************************************************/

$heures   = 0;  // les heures < 24
$minutes  = 2;   // les minutes  < 60
$secondes = 00;  // les secondes  < 60

$annee = date("Y");  // par defaut cette année
$mois  = date("m");  // par defaut ce mois
$jour  = date("d");  // par defaut aujourd'hui

// quand le compteur arrive à 0
// -> redirection
$redirection = '../controller/pa_completeactivity?id=1';

/*******************************************************************************
 * calcul des secondes
 ***************************************************************************/

$secondes = mktime(date("H") + $heures,
        date("i") + $minutes,
        date("s") + $secondes,
        $mois,
        $jour,
        $annee
    ) - time();
?>

<html>
<head>
    <title>Demo compte a rebour</title>
    <script type="text/javascript">
        var temps = <?php echo $secondes;?>;
        var timer =setInterval('CompteaRebour()',1000);
        function CompteaRebour(){

            temps-- ;
            j = parseInt(temps) ;
            h = parseInt(temps/3600) ;
            m = parseInt((temps%3600)/60) ;
            s = parseInt((temps%3600)%60) ;
            document.getElementById('minutes').innerHTML= (h<10 ? "0"+h : h) + '  h :  ' +
                (m<10 ? "0"+m : m) + ' mn : ' +
                (s<10 ? "0"+s : s) + ' s ';
            if ((s == 0 && m ==0 && h ==0)) {
                clearInterval(timer);
                url = "<?php echo $redirection;?>"
                Redirection(url)
            }
        }
        function Redirection(url) {
            setTimeout("window.location=url", 500)
        }
    </script>
</head>

<body onload="timer">
<?php
// la condition est que le nombre de seconde soit etre superieur a 24 heures
if ($secondes <= 3600*24) {
    ?>
    <span style="font-size: 14px;">Time left:</span>
    <div id="minutes" style="font-size: 14px;"></div></span>
    <?php
}
?>
</body>
</html>

