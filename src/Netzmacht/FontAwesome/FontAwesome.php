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

namespace Netzmacht\FontAwesome;
use Backend;
use Contao\LayoutModel;
use Input;

/**
 * icon replacer adds javascript to backend template if the icon replacer is enabled 
 * 
 */
class FontAwesome
{

	/**
	 * @var array
	 */
	protected $icons = array();


	/**
	 * Construct
	 */
	public function __construct()
	{
		foreach($this->getAllIcons() as $group) {
			$this->icons = array_merge($this->icons, $group);
		}

		$this->debugMode = $this->debugMode = $GLOBALS['TL_CONFIG']['debugMode'] ||
			(class_exists('Bit3\Contao\ThemePlus\ThemePlus') && call_user_func(array('Bit3\Contao\ThemePlus\ThemePlus', 'isDesignerMode'))) ||
			(class_exists('ThemePlus\ThemePlus') && call_user_func(array('ThemePlus\ThemePlus', 'isDesignerMode')));
	}

		
	/**
	 * check if font awesome is active
	 * 
	 * @return bool
	 */
	public function isActive()
	{
		if(TL_MODE != 'BE') {
			return false;
		}

		\BackendUser::getInstance()->authenticate();

		return (
			$GLOBALS['TL_CONFIG']['requireFontAwesome'] ||
			$GLOBALS['TL_CONFIG']['forceFontAwesome'] ||
			\BackendUser::getInstance()->useFontAwesome == '1'
		);
	}


	/**
	 * initialize system
	 */
	public function initialize()
	{
		if(!$this->isActive()) {
			return;
		}

		$GLOBALS['TL_CSS']['font-awesome-icons'] = 'system/modules/font-awesome/assets/icons.min.css|all|static';

		// template settings
		$strOriginPath = \TemplateLoader::getPath('be_main', 'html5');
		$strDefaultPath = TL_ROOT . '/system/modules/core/templates/backend/be_main.html5';

		$blnChanged = false;

		// only change be_main if no other be_main then the default one is chosen
		// we use customized navigation templates so we do not need to load icons dynamically
		if($strDefaultPath == $strOriginPath) {
			\TemplateLoader::addFile('be_main', 'system/modules/font-awesome/templates/dynamic');
			$GLOBALS['ICON_REPLACER']['navigation']['phpOnly'] = true;
		}

		\TemplateLoader::addFile('be_navigation', 'system/modules/font-awesome/templates/dynamic');

		// remove config which should not pass to javascript
		$arrConfig = $GLOBALS['ICON_REPLACER'];

		foreach($arrConfig as $strKey => $arrPart) {
			if(isset($arrPart['phpOnly']) && $arrPart['phpOnly'] == true) {
				unset($arrConfig[$strKey]);
			}
		}

		// append javascript
		$strJson = json_encode($arrConfig);
		$GLOBALS['TL_MOOTOOLS'][] = sprintf('<script type="text/javascript">var replaceIconsConfig = %s;</script>', $strJson);
		$GLOBALS['TL_MOOTOOLS'][] = '<script type="text/javascript" src="system/modules/font-awesome/assets/replacer.min.js"></script>';
	}


	/**
	 * @param $objPage
	 * @param $objLayout
	 */
	public function hookGetPageLayout($objPage, $objLayout)
	{
		/** @var LayoutModel $objLayout */
		if($objLayout->fontAwesome) {
			$GLOBALS['TL_CSS']['font-awesome'] = 'assets/font-awesome/css/' . $objLayout->fontAwesome;
		}
	}


	/**
	 * replace icon insert tag
	 *
	 * Following formats are supported
	 * {{fa::phone}}
	 * {{fa::phone 4x muted}}                       every entry sperated by space get an fa- prefix
	 * {{fa::phone rotate-90 large::pull-left}}     2nd param is added as class without prefix
	 *
	 * @param $tag
	 * @param $cache
	 * @return string
	 */
	public function replaceInsertTag($tag, $cache)
	{
		$parts = explode('::', $tag);

		if($parts[0] == $GLOBALS['TL_CONFIG']['fontAwesomeInsertTag']) {
			$class = str_replace(' ', ' fa-', $parts[1]);

			if($this->debugMode) {
				$icon = trimsplit(' ', $parts[1]);

				if(!$this->iconExists($icon[0])) {
					return sprintf('<span style="color:red;">[fa-%s]</span>', $class);
				}
			}

			if(isset($parts[2])) {
				$class .= ' ' . $parts[2];
			}

			return sprintf(
				$GLOBALS['FONT-AWESOME']['template'],
				$class
			);
		}

		return false;
	}


	/**
	 * @return mixed
	 */
	public function getAllIcons()
	{
		return include TL_ROOT . '/system/modules/font-awesome/config/icons/icons.php';
	}


	/**
	 * @param $icon
	 * @return bool
	 */
	public function iconExists($icon)
	{
		return in_array($icon, $this->icons);
	}


	/**
	 * @param $dc
	 * @return string
	 */
	public function generateIcon($dc)
	{
		$value = $dc->activeRecord->{$dc->field};

		if($value !== null) {
			return sprintf($GLOBALS['FONT-AWESOME']['template'], $value);
		}

		return '';
	}

}

