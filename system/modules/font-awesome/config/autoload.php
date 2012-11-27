<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package   font-awesome 
 * @author    David Molineus <http://www.netzmacht.de>
 * @license   GNU/LGPL 
 * @copyright Copyright 2012 David Molineus netzmacht creative 
 * 
 */

/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Netzmacht',
));

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Netzmacht\IconReplacer'		=> 'system/modules/font-awesome/classes/IconReplacer.php',
	'Netzmacht\FontAwesome'		=> 'system/modules/font-awesome/classes/FontAwesome.php',
));

if($_GET['do'] == 'repository_manager' && (
	$_GET['install'] != 'font-awesome' || $_GET['uninstall'] != 'font-awesome') && 
	($_GET['install'] != '' || $_GET['uninstall'] != '') 
) 
{
	ClassLoader::addClass('BackendTemplate', 'system/modules/font-awesome/classes/BackendTemplate.php');
}
