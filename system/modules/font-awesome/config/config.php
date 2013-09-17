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
 * content element
 */
$GLOBALS['TL_CTE']['texts']['fontAwesomeIcon'] = 'Netzmacht\FontAwesome\ContentIcon';


/**
 * hooks
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags']['font-awesome'] = array('Netzmacht\FontAwesome\FontAwesome', 'replaceInsertTag');
$GLOBALS['TL_HOOKS']['initializeSystem'][]                = array('Netzmacht\FontAwesome\FontAwesome', 'initialize');


// load icons config
if(TL_MODE == 'BE') 
{
	require_once TL_ROOT . '/system/modules/font-awesome/config/icons/replacer.php';
}

// which insert tag will be used
$GLOBALS['TL_CONFIG']['fontAwesomeInsertTag'] = 'fa';

// support of icon handling of Bootstrap extension
$GLOBALS['BOOTSTRAP']['icons']['sets']['font-awesome'] = array
(
	'path'      => 'system/modules/font-awesome/config/icons/icons.php',
	'template'  => '<i class="icon-%s"></i>',
);