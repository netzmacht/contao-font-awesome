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

namespace Netzmacht;
use Backend;
use Input;

/**
 * icon replacer adds javascript to backend template if the icon replacer is enabled 
 * 
 */
class FontAwesome extends Backend
{

	public function __construct()
	{
		$this->import('BackendUser', 'User');

		parent::__construct();
	}

		
	/**
	 * check if font awesome is active
	 * 
	 * @return bool
	 */
	public function isActive()
	{
		return (
			TL_MODE == 'BE' && (
				$GLOBALS['TL_CONFIG']['requireFontAwesome'] ||
				$GLOBALS['TL_CONFIG']['forceFontAwesome'] ||
				$this->User->useFontAwesome == '1'
			)
		);
	}

	public function onInitializeSystem()
	{
		// user is not authenticated at this moment.
		$this->User->authenticate();

		if(!$this->isActive())
		{
			return;
		}

		// template settings
		$strOriginPath = \TemplateLoader::getPath('be_main', 'html5');
		$strDefaultPath = TL_ROOT . '/system/modules/core/templates/be_main.html5';

		$blnChanged = false;

		// only change be_main if no other be_main then the default one is chosen
		// we use customized navigation templates so we do not need to load icons dynamically
		if($strDefaultPath == $strOriginPath)
		{
			\TemplateLoader::addFile('be_main', 'system/modules/font-awesome/templates');
			$GLOBALS['ICON_REPLACER']['navigation']['phpOnly'] = true;
		}

		\TemplateLoader::addFile('be_navigation', 'system/modules/font-awesome/templates');

		// remove config which should not pass to javascript
		$arrConfig = $GLOBALS['ICON_REPLACER'];

		foreach($arrConfig as $strKey => $arrPart)
		{
			if(isset($arrPart['phpOnly']) && $arrPart['phpOnly'] == true) {
				unset($arrConfig[$strKey]);
			}
		}

		// append javascript
		$strJson = json_encode($arrConfig);
		$GLOBALS['TL_MOOTOOLS'][] = sprintf('<script type="text/javascript">var replaceIconsConfig = %s;</script>', $strJson);
		$GLOBALS['TL_MOOTOOLS'][] = '<script type="text/javascript" src="system/modules/font-awesome/assets/replacer.js"></script>';

		$GLOBALS['TL_CSS']['font-awesome']       = 'assets/font-awesome/css/font-awesome.css|all|static';
		$GLOBALS['TL_CSS']['font-awesome-icons'] = 'system/modules/font-awesome/assets/icons.min.css|all|static';
	}
}
