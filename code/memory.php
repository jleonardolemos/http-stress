<?php
ini_set('memory_limit', '32G');

$n = $_GET['megas'] ?? 500;
$t = $_GET['seconds'] ?? 1;

function tryMem($mbyte, $time)
{
    $bytes = 1048576;
    echo("Allocate Attempt {$mbyte} MBs");
    echo "<br>";
    $dummy = str_repeat("0", $bytes * $mbyte);
    echo("Current Memory Use: " . memory_get_usage(true) / $bytes . ' MBs');
    echo "<br>";
    echo("Peak Memory Use: " . memory_get_peak_usage(true) / $bytes . ' MBs');
    echo "<br>";

    sleep($time);
}

tryMem($n, $t);
