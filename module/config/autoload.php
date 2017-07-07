<?php

/**
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
	'Netzmacht\FontAwesome\FontAwesome'             => 'system/modules/font-awesome/classes/FontAwesome.php',
));

TemplateLoader::addFiles(array(
	'ce_icon' => 'system/modules/font-awesome/templates',
));
