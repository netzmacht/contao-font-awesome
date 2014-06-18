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
	 * @var bool
	 */
	private $debugMode = false;

	/**
	 * @var bool
	 */
	private $isActive;


	/**
	 * Construct
	 */
	public function __construct()
	{
		foreach($this->getAllIcons() as $group) {
			$this->icons = array_merge($this->icons, $group);
		}

		$this->detectDebugMode();
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

		if($this->isActive === null) {
			\BackendUser::getInstance()->authenticate();

			$this->isActive = $GLOBALS['TL_CONFIG']['requireFontAwesome'] ||
				$GLOBALS['TL_CONFIG']['forceFontAwesome'] ||
				\BackendUser::getInstance()->useFontAwesome == '1';
		}

		return $this->isActive;
	}


	/**
	 * initialize system
	 */
	public function initialize()
	{
		if(!$this->isActive()) {
			return;
		}

		$this->loadDynamicTemplates();
		$this->initializeAssets();
	}


	/**
	 * @param $objPage
	 * @param $objLayout
	 */
	public function hookGetPageLayout($objPage, $objLayout)
	{
		/** @var LayoutModel $objLayout */
		if($objLayout->fontAwesome) {
			$GLOBALS['TL_CSS']['font-awesome'] = 'assets/components/font-awesome/css/' . $objLayout->fontAwesome;
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


	/**
	 * Detect debug mode
	 */
	protected function detectDebugMode()
	{
		if($GLOBALS['TL_CONFIG']['debugMode']) {
			$this->debugMode = $GLOBALS['TL_CONFIG']['debugMode'];
		}
		elseif(class_exists('Bit3\Contao\ThemePlus\ThemePlusEnvironment')) {
			$this->debugMode = call_user_func(array('Bit3\Contao\ThemePlus\ThemePlusEnvironment', 'isDesignerMode'));
		}
		elseif(class_exists('ThemePlus\ThemePlus')) {
			$this->debugMode = call_user_func(array('ThemePlus\ThemePlus', 'isDesignerMode'));
		}
	}


	/**
	 */
	protected function loadDynamicTemplates()
	{
		// template settings
		$originPath = \TemplateLoader::getPath('be_main', 'html5');
		$defaultPath = TL_ROOT . '/system/modules/core/templates/backend/be_main.html5';

		// only change be_main if no other be_main then the default one is chosen
		// we use customized navigation templates so we do not need to load icons dynamically
		if($defaultPath == $originPath) {
			if(version_compare(VERSION, '3.3', '>=')) {
				$path = 'system/modules/font-awesome/templates/dynamic/3.3';
			} else {
				$path = 'system/modules/font-awesome/templates/dynamic/3.2';
			}

			\TemplateLoader::addFile('be_main', $path);
			$GLOBALS['ICON_REPLACER']['navigation']['phpOnly'] = true;
		}

		\TemplateLoader::addFile('be_navigation', 'system/modules/font-awesome/templates/dynamic');
	}

	protected function initializeAssets()
	{
		$GLOBALS['TL_CSS']['font-awesome-icons'] = 'system/modules/font-awesome/assets/icons.min.css|all|static';

		// remove config which should not pass to javascript
		$arrConfig = $GLOBALS['ICON_REPLACER'];

		foreach($arrConfig as $strKey => $arrPart) {
			if(isset($arrPart['phpOnly']) && $arrPart['phpOnly'] == true) {
				unset($arrConfig[$strKey]);
			}
		}

		// append javascript
		$strJson                  = json_encode($arrConfig);
		$GLOBALS['TL_MOOTOOLS'][] = sprintf('<script type="text/javascript">var replaceIconsConfig = %s;</script>', $strJson);
		$GLOBALS['TL_MOOTOOLS'][] = '<script type="text/javascript" src="system/modules/font-awesome/assets/replacer.min.js"></script>';
	}

}

