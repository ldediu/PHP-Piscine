#!/usr/bin/php
<?php
if ($argc > 1)
{
    $str = trim($argv[1]);
    $str = preg_replace('/\s+/', ' ', $str);
    $arr = explode(" ", $str);
    $first = array_shift($arr);
    $str = implode(" ", $arr);
	if ($str)
    	echo $str." ";
    echo $first."\n";
}
?>