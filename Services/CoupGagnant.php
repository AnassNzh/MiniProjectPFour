<?php

class CoupGagnant
{
    function is_win($position) {
        //global $board, $turn;
        //$posx = $_POST['col'] - 1;
        $posx = $position - 1;
        // On doit maintenant retrouver la hauteur du dernier pion
        $i = HAUT - 1;
        while ($i>=0) {
            if (!($GLOBALS['board'][$posx][$i] == 0)) {
                break;
            } else {
                $i--;
            }
        }
        $posy = $i;
        return((self::total_line($posx, $posy, 0, 1) >= 4)
            || (self::total_line($posx, $posy, 1, 0) >= 4)
            || (self::total_line($posx, $posy, 1, 1) >= 4)
            || (self::total_line($posx, $posy, -1, 1) >= 4));
    }

    function total_line($posx, $posy, $dx, $dy) {
        return 1 + self::nb_align($posx+$dx, $posy+$dy, $dx, $dy) + self::nb_align($posx-$dx, $posy-$dy, -$dx, -$dy);
    }

    // Les 2 fonctions suivantes permettent de verifier si le dernier coup etait gagnant
    function nb_align($posx, $posy, $dx, $dy) {
        //global $board, $turn;
        if ($posx<0 || $posx>=LARG || $posy<0 || $posy>=HAUT) {
            return 0;
        } else if ($GLOBALS['board'][$posx][$posy] == $GLOBALS['turn'])	{
            return 1 + (self::nb_align($posx+$dx, $posy+$dy, $dx, $dy));
        } else return 0;
    }
}