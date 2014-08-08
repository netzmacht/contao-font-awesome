<?php

/**
 * 
 * @package   font-awesome 
 * @author    David Molineus <http://www.netzmacht.de>
 * @license   GNU/LGPL 
 * @copyright Copyright 2012 David Molineus netzmacht creative 
 * 
 */  

namespace Netzmacht\FontAwesome;
use Backend;

/**
 * icon replacer adds javascript to backend template if the icon replacer is enabled 
 * 
 */
class IconReplacer extends Backend
{
	
	/**
	 * generate icon as html
	 * 
	 * @param string $strPart part
	 * @param string $strTestOrClass test case or class
	 * @param int $intType 0 searching for both, 1 search for style, 2 search for image
	 *
	 * @return string
	 */
	public static function generateIcon($strPart, $strTestOrClass, $intType=0)
	{
		$arrIcon = static::getIcon($strPart, $strTestOrClass, $intType);
		
		if(!is_array($arrIcon)) 
		{
			return '';
		}

		$class = $arrIcon[0];
		$class .= ' fa-' . (isset($arrIcon[2]['size']) ? $arrIcon[2]['size'] : 'large');
		$icon  = sprintf($GLOBALS['FONT-AWESOME']['template'], $class);

		if($GLOBALS['ICON_REPLACER']['addSpace']) {
			$icon .= '&nbsp;';
		}

		return $icon;
	}
	
	
	/**
	 * try to find icon. first check style icons than image icons
	 * 
	 * @param string part
	 * @param string test case or class
	 * @return array
	 * @param int 0 searching for both, 1 search for style, 2 search for image
	 */
	public static function getIcon($strPart, $strTestOrClass, $intType=0)
	{
		if($intType == 0 || $intType == 1) 
		{
			$arrIcon = self::getStyleIcon($strPart, $strTestOrClass);
			
			if(is_array($arrIcon)) 
			{
				return $arrIcon;
			}
			
			if($intType == 1) 
			{
				return null;
			}
				
		}		
		
		return self::getImageIcon($strPart, $strTestOrClass);		
	}
	

	/**
	 * try to find image icon class
	 * 
	 * @param string part
	 * @param string test case or class
	 * @return string
	 */
	public static function getImageIcon($strPart, $strTest)
	{
		if(!isset($GLOBALS['ICON_REPLACER'][$strPart]['imageIcons']))
		{
			return null;
		}
		
		// go throw icon list and try to match 
		foreach($GLOBALS['ICON_REPLACER'][$strPart]['imageIcons'] as $arrIcon)
		{
			if(strpos($arrIcon[1], $strTest) !== false)
			{
				return $arrIcon;
			}
		}
		
		return null;
	}
	
	
	/**
	 * try to find image icon class
	 * 
	 * @param string part
	 * @param string test case or class
	 * @return string
	 */
	public static function getStyleIcon($strPart, $strClass)
	{
		if(!isset($GLOBALS['ICON_REPLACER'][$strPart]['styleIcons']))
		{
			return null;
		}
		
		// go throw icon list and try to match 
		foreach($GLOBALS['ICON_REPLACER'][$strPart]['styleIcons'] as $arrIcon)
		{
			if($arrIcon[1] == $strClass) 
			{
				return $arrIcon;
			}
		}
		
		return null;	
	}
	
}
