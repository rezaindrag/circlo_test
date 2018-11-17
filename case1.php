<?php

function fivaa($n) {
    for ($r = $n; $r >= 1; $r--) {
        echo ($r - 1).($r - 1);
        for ($c = 1; $c <= $r; $c++) {
            echo $r + 1;
        }

        echo PHP_EOL;
    }
}

fivaa(5);