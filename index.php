<?php
require('vendor/autoload.php');

require 'LuaBlock.php';

$Parsedown = new Parsedown();
$smarty = new Smarty();
$result = scandir ( "./guide" );
$files = array();

//print_r($result);

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

/*
echo "<html>";
echo "<head>";
echo '<link rel="stylesheet" href="/styles/rainbow.css">';
echo '<script src="/highlight.pack.js"></script>';
echo "</head>";
echo "<body>";
echo '<script>hljs.initHighlightingOnLoad();</script>';
echo "</body>";
echo "</html>";
*/
$smarty->caching = false;
$smarty->display('index.tpl');



// <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/styles/default.min.css">
// <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/highlight.min.js"></script>
