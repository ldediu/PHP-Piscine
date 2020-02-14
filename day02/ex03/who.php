#!/usr/bin/php
<?php
$output = shell_exec("w");
preg_match_all('/([0-9][0-9]:[0-9][0-9])/', $output, $date);
unset($date[0]);
$b = array_values($date);
echo get_current_user();
echo "\t";
echo "console";
echo "   ";
date_default_timezone_set("America/Los_Angeles");
echo date("M  j ");
print_r($b['0']['1']);
echo("\n");
?>