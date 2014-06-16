<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package Font-awesome
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Elements
	'Netzmacht\FontAwesome\ContentIcon'             => 'system/modules/font-awesome/elements/ContentIcon.php',


	// Classes
	'Netzmacht\FontAwesome\IconReplacer'            => 'system/modules/font-awesome/classes/IconReplacer.php',
	'Netzmacht\FontAwesome\FontAwesome'             => 'system/modules/font-awesome/classes/FontAwesome.php',
));

TemplateLoader::addFiles(array(
	'ce_icon' => 'system/modules/font-awesome/templates',
));
