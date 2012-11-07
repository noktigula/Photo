<?php
	//$h = opendir(".");
	/*while (false !== ($file = readdir($h)))
	{
		echo "$file<br />";
	} // 
	echo "<br /><br />";
	closedir($h);*/
	
	$handle = opendir("/photo/images/");
	while (false !== ($file = readdir($handle)))
	{
		echo "$file<br />";
	} // 
	echo "<br /><br />";
?>