<?php

$n = $_GET['seconds'] ?? 1;

function stress($sec)
{
    $future = time() + $sec;

    while (time() < $future) {
        $add = rand(1, 99999) + rand(1, 99999);
    }
}

stress($n);

echo "single cpu stressed for " . $n . ' seconds';
