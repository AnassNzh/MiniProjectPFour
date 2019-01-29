<?php

class Choix
{
    function affiche_choix(){
        //global $j1, $j2, $turn;
        echo "C'est à ".(($GLOBALS['turn'] == 1)? $GLOBALS['j1'] : $GLOBALS['j2']).' (<img src="'.(($GLOBALS['turn'] == 1)? "Resources/Images/joueur1.png" : "Resources/Images/joueur2.png" ).'" alt="pionJoueur" height="15">) de jouer.'."\n";
    }
}