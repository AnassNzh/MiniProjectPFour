<?php

class AIAffichagePlateau
{
    function print_board() {
        require_once("Services/AffichageLigne.php");
        $affichageLigne = new AffichageLigne();

        echo '<form name="board" class="intable" action="index.php?url=aigame" method="post">'."\n";
        echo '<table>'."\n";
        for ($i=(HAUT - 1); $i>=0; $i--) $affichageLigne->print_line($i);
        $affichageLigne->print_line_form();
        echo "</table>\n</form>\n";
    }
}