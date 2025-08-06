<?php

require __DIR__ . '/vendor/autoload.php';

// You can also define global helpers here if needed
if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $var) {
            Symfony\Component\VarDumper\VarDumper::dump($var);
        }
        die(1);
    }
}
