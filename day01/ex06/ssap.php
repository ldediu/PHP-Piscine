#!/usr/bin/php
<?php
if ($argc > 1)
{
    $tab = array();
    $tab = implode(" ", $argv);
    $tab = preg_replace('/\s+/', ' ', $tab);
    $tab = trim($tab);
    $tab = explode(" ", $tab);
    sort($tab);
    foreach ($tab as $elem) 
    {
        echo "$elem" . "\n";
    }
}
?>