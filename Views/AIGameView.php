<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <link rel="stylesheet" type="text/css" href="CSS/p4.css" title="Normal" />
    <title>Puissance 4</title>
</head>
<body>
<div>
    <?php
    if ($GLOBALS['turn'] === 2){
        $jouerCoup->play($aiMoves->AIPlay(), 2);
        if ($coupGagnant->is_win($aiMoves->AIPlay())) {
            echo "<b>Computer a gagné !</b><br />";
            $_SESSION['finish'] = true;
        } else {
            $GLOBALS['turn'] = 1;
        }
    }
    else if (isset($_POST['col'])) {

            // Si le coup est valide, il est joue, on verifie s'il est gagnant et on passe au tour suivant
            if ($jouerCoup->play(($_POST['col'] - 1), $GLOBALS['turn'])) {
                if ($coupGagnant->is_win($_POST['col'])) {
                    echo "<b>".$GLOBALS['j1']." a gagné !</b><br />";
                    $_SESSION['finish'] = true;
                } else {
                    $GLOBALS['turn']=2;
                }
            }
    }

    $affichagePlateau->print_board();

    $choix->affiche_choix();
    ?>

    <form action="index.php?url=aigame" method="post">
        <input type="submit" name="clear" value="Recommencer" />
    </form>

    <form action="index.php" method="post">
        <input type="submit" value="Changer les noms" />
</div>
</body>
</html>

<script type="text/javascript">
    window.onload=function(){
        var a = document.getElementById('img').src.split("/")
        a = a[a.length-1];
        if (a == "joueur2.png")
            document.forms['board'].submit();
    }
</script>