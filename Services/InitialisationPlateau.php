<?php

class InitialisationPlateau
{
    function init() {
        //global $board;
        for ($i=0; $i<LARG; $i++) {
            for ($j=0; $j<HAUT; $j++) {
                $GLOBALS['board'][$i][$j]=0;
            }
        }
        $_SESSION['finish'] = false;
        return"initDone";
    }


}