<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str) {
	echo '<pre>';
	var_dump($str);
	echo '</pre>';
	exit;
}
function dd(...$vars) {
    foreach ($vars as $var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
	exit;
}
