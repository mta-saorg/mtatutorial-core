<?php
require('vendor/autoload.php');

$Parsedown = new Parsedown();
$smarty = new Smarty();
$result = scandir ( "./guide" );
$files = array();

foreach($result as $value)
{
	if($value != "." && $value != "..")
	{
		if(pathinfo($value)["extension"] == "md")
		{
			array_push($files, $value);
		}
	}

}
$smarty->assign("files", $files);

if(isset($_GET["page"]))
{
	if(in_array($_GET["page"], $files))
	{
		$smarty->assign("code", $Parsedown->text(file_get_contents('./guide/' . $_GET["page"], true)));
	}
	else
	{
		$smarty->assign("code", $Parsedown->text(file_get_contents('./guide/index.md', true)));
	}
}
else{
	$smarty->assign("code", $Parsedown->text(file_get_contents('./guide/index.md', true)));
}

$smarty->caching = false;
$smarty->display('index.tpl');
