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
        if ($coupGagnant->is_win($aiMoves->AIPlay() + 1)) {
            echo "<b id='win'>Computer a gagné !</b><br />";
            $model->incScore($GLOBALS['j1']);
            $_SESSION['finish'] = true;
        } else {
            $GLOBALS['turn'] = 1;
        }
    }
    else if (isset($_POST['col'])) {

        // Si le coup est valide, il est joue, on verifie s'il est gagnant et on passe au tour suivant
        if ($jouerCoup->play(($_POST['col'] - 1), $GLOBALS['turn'])) {
            if ($coupGagnant->is_win($_POST['col'])) {
                echo "<b id='win'>".$GLOBALS['j1']." a gagné !</b><br />";
                $model->incScore($GLOBALS['j1']);
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
    </form>
    <?php
    $tab=$model->getAllJoueur();
    echo'<table>';
    echo '<tr>';
    echo '<th>nom</th>';
    echo '<th>score</th>';
    echo '</tr>';
    foreach ($tab as $row){
        echo '<tr>';
        echo "<td>". $row[1] ."</td>";
        echo "<td>". $row[2] ."</td>";
        echo '</tr>';
    }
    echo'</table>';
    ?>
</div>
</body>
</html>

<script type="text/javascript">
    window.onload=function(){
        var win = document.getElementById('win');
        var a = document.getElementById('img').src.split("/");
        a = a[a.length-1];
        console.log((a == "joueur2.png") + " and " + (win == null))
        if (a == "joueur2.png" && win == null)
            document.forms['board'].submit();
    }
</script>