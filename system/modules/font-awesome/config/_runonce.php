<?php


if(version_compare(VERSION, '3.1', '<'))
{
	$file = new \File('system/config/initconfig.php');
	$file->append('');
	$file->append('// setting up font awesome extension');
	$file->append('$fa = new FontAwesome();');
	$file->append('$fa->onInitializeSystem();');
	$file->append('');
	$file->close();
}