#!/usr/bin/php
<?php
function replace($match)
{
    // print_r($match);
	$retline = $match[1].strtoupper($match[2]).$match[3];
	return ($retline);
}

if ($argc > 1)
{
    $line = "";
	$fd = fopen($argv[1], "r");
	$title = "/(<.*title=\")(.*)(\">)/i";
	$link = "/(<a.*>)(.*)(<\/a)/i";
	$img = "/(<a.*>)(.*)(<img)/i";
	while (!feof($fd))
	{
        $line .= fgets($fd);
	}
	fclose ($fd);
	$line = preg_replace_callback("$title", "replace", $line);
	$line = preg_replace_callback("$link", "replace", $line);
	$line = preg_replace_callback("$img", "replace", $line);
    echo "$line";
}
 ?>