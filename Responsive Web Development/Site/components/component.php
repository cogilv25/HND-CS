<?php
	$pageName = basename($_SERVER['PHP_SELF']);
	if($pageName == $componentName or $pageName == "component.php")
	{
		header('Location:../index.php');
		die();
	}
?>