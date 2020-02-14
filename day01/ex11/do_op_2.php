#!/usr/bin/php
<?php
function ft_strsplit($str)
{
    $ret = array_filter(explode(' ', $str));
    $ret = array_values($ret);
    return $ret;
}

if ($argc != 2)
{
    echo "Incorrect Parameters\n";
    exit();
}
$str = $argv[1];
$str = str_replace("*", " * ", $str);
$str = str_replace("+", " + ", $str);
$str = str_replace("-", " - ", $str);
$str = str_replace("/", " / ", $str);
$str = str_replace("%", " % ", $str);
$arr = ft_strsplit($str);
$ops = array("*", "+", "-", "/", "%");
if (count($arr) != 3 || !ctype_digit(trim($arr[0])) ||
    !ctype_digit(trim($arr[2])) || !in_array(trim($arr[1]), $ops))
{
    echo "Syntax Error\n";
    exit();
}
if (trim($arr[2]) == 0 && (trim($arr[1]) == "/" || trim($arr[1]) == "%"))
    echo "Division by zero error";
else if (trim($arr[1]) == "+")
    echo trim($arr[0]) + trim($arr[2]);
else if (trim($arr[1]) == "-")
    echo trim($arr[0]) - trim($arr[2]);
else if (trim($arr[1]) == "/")
    echo trim($arr[0]) / trim($arr[2]);
else if (trim($arr[1]) == "*")
    echo trim($arr[0]) * trim($arr[2]);
else if (trim($arr[1]) == "%")
    echo trim($arr[0]) % trim($arr[2]);
echo "\n";
?>
