<?php

class JouerCoup
{
    // Si la colonne est pleine, renvoie false. Joue le coup et renvoie true autrement.
    function play($col, $player) {
        //global $board;
        $i = 0;
        $done = false;
        while ($i<HAUT) {
            if ($GLOBALS['board'][$col][$i] == 0) {
                $GLOBALS['board'][$col][$i] = $player;
                $done=true;
                break;
            } else {
                $i++;
            }
        }
        return $done;
    }

}