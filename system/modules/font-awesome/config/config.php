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
 
// register hook
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('Netzmacht\FontAwesome', 'onParseTemplate');
$GLOBALS['SETUP_EXT_HOOK']['font-awesome'][] = array('Netzmacht\FontAwesome', 'onParseTemplate');

// load icons config
if(TL_MODE == 'BE') 
{
	require_once TL_ROOT . '/system/modules/font-awesome/config/icons.php';
}

// define which templates
$GLOBALS['TL_CONFIG']['useFontAwesomeOnTemplates'] = array('be_main');