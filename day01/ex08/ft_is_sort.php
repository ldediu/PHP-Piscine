#!/usr/bin/php
<?php
function ft_is_sort($tab)
{
    if (!$tab)
        return(FALSE);
	$temp = $tab;
	sort($temp);
	if ($temp == $tab)
		return(TRUE);
	else
		return(FALSE);
}
?>