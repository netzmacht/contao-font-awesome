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


/**
 * icon replacer adds javascript to backend template if the icon replacer is enabled 
 * 
 */
class FontAwesome extends Backend
{
		
	/**
	 * check if font awesome is active
	 * 
	 * @return bool
	 */
	public function isActive()
	{		
		$this->import('BackendUser', 'User');
		
		return (
			$GLOBALS['TL_CONFIG']['requireFontAwesome'] || 
			$GLOBALS['TL_CONFIG']['forceFontAwesome'] || 
			$this->User->useFontAwesome == '1'
		);
	}
	
	/**
	 * hook for parseTemplate
	 * do some template magic
	 * 
	 * @param Template
	 */
	public function onParseTemplate($objTemplate)
	{
		if(TL_MODE != 'BE' || !$this->isActive())
		{
			return;			
		}
		
		$strTemplate = $objTemplate->getName();
		
		// manage navigation icon replacement
		if($strTemplate == 'be_main' || $strTemplate == 'be_navigation')
		{
			$strOriginPath = \TemplateLoader::getPath($strTemplate, 'html5');
			$strDefaultPath = TL_ROOT . '/system/modules/core/templates/be_main.html5';
			$blnChanged = false;
			
			// only change be_main if no other be_main then the default one is chosen
			// we use customized navigation templates so we do not need to load icons dynamically
			if($strDefaultPath == $strOriginPath) 
			{
				\TemplateLoader::addFile('be_main', 'system/modules/font-awesome/templates');
				$blnChanged = true;									
			}
			
			// if the be_navigation is overriden by another module, I'm sorry and hope our one will win 
			// the setting race. But we change it really late so I hope we will figt the game :)
			\TemplateLoader::addFile('be_navigation', 'system/modules/font-awesome/templates');
			
			// do not pass navigation icons to the javascript
			if($blnChanged || $strTemplate == 'be_navigation') 
			{			
				$GLOBALS['ICON_REPLACER']['navigation']['phpOnly'] = true;	
			}
		}
		
		
		// add css and javascript files
		//echo var_dump($strTemplate);
		if(in_array($strTemplate, $GLOBALS['useFontAwesomeOnTemplates']))	
		{
			unset($GLOBALS['TL_CSS']);
			$objTemplate->stylesheets .= '<!-- Font Awesome icons used, licensed under CC BY 3.0: Font Awesome - http://fortawesome.github.com/Font-Awesome -->';
			$objTemplate->stylesheets .= '<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">';
			$objTemplate->stylesheets .= '<link rel="stylesheet" href="system/modules/font-awesome/assets/icons.css">';
			
			
			$arrConfig = $GLOBALS['ICON_REPLACER'];
			
			// remove config which should not pass to javascript
			foreach($arrConfig as $strKey => $arrPart) 
			{
				if(isset($arrPart['phpOnly']) && $arrPart['phpOnly'] == true) {
					unset($arrConfig[$strKey]);
				}
			}
			
			// append javascript
			$strJson = json_encode($arrConfig);		
			$objTemplate->javascripts .= sprintf('<script type="text/javascript">replaceIconsConfig = %s;</script>', $strJson);
			$objTemplate->javascripts .= '<script src="system/modules/font-awesome/assets/replacer.js"></script>';					
		}		
	}
	
}
