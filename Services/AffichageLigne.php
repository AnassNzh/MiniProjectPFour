<?php

class AffichageLigne
{
    function print_line($line) {
        //global $board;
        echo "<tr>\n";
        for ($i=0; $i<LARG; $i++) {
            $c = $GLOBALS['board'][$i][$line];
            echo '<td><img src="';
            echo (($c == 0) ? "Resources/Images/vide.png" : (($c == 1) ? "Resources/Images/joueur1.png" : "Resources/Images/joueur2.png"));
            echo '" alt="';
            echo (($c == 0) ? "0" : (($c == 1) ? "j1" : "j2"));
            echo '" /></td>';
        }
        echo "\n</tr>\n";
    }

    // attention : pour faire plus joli, on nomme les colonnes de 1 a 7.
    // Il faut donc faire attention lorsque l'on recupere la valeur de la colonne jouee.
    function print_line_form() {
        echo '<tr class="lastline">'."\n";
        for ($i=0; $i<LARG; $i++) {
            echo '<td><input type="submit" name="col" value="'.($i + 1).'"';
            if ($_SESSION['finish'])
                echo 'disabled';
            echo '/></td>';

        }
        echo "\n</tr>\n";
    }
}