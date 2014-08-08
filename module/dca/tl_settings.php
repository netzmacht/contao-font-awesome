<?php

/**
 * 
 * @package   cloud-api 
 * @author    David Molineus <http://www.netzmacht.de>
 * @license   GNU/LGPL 
 * @copyright Copyright 2012 David Molineus netzmacht creative 
 *  
 **/

 /**
  * extends the settings palettes
  * 
  * cloudapi_hook is not an field. used for inserting the parts of each cloud api
  * by str_replace('cloudapi_hook', 'new,cloudapi_hook', $old) 
  */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = str_replace (
	'staticPlugins',
	'staticPlugins,forceFontAwesome',
	$GLOBALS['TL_DCA']['tl_settings']['palettes']['default']
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['forceFontAwesome'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['forceFontAwesome'],
	'default'                 => 1,
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr'),
);
