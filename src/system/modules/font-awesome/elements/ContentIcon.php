<?php
/**
 * Created by JetBrains PhpStorm.
 * User: david
 * Date: 11.07.13
 * Time: 09:51
 * To change this template use File | Settings | File Templates.
 */

namespace Netzmacht\FontAwesome;


/**
 * Class IconElement
 * @package Netzmacht\FontAwesome
 */
class ContentIcon extends \ContentElement
{
	protected $strTemplate = 'ce_icon';

	/**
	 *
	 */
	protected function compile()
	{
		$this->Template->stackBaseOnTop = $this->fontAwesome_iconStackBaseTop;
		$this->Template->stack = false;

		$arrClasses = array($this->fontAwesome_icon);
		$arrStack = array();

		// convert style
		$this->fontAwesome_iconStyle = deserialize($this->fontAwesome_iconStyle);

		if(is_array($this->fontAwesome_iconStyle))
		{
			foreach($this->fontAwesome_iconStyle as $style)
			{
				$arrClasses[] = $style;
			}
		}


		$color = deserialize($this->fontAwesome_iconColor);

		if($color[0] != '')
		{
			$strStyle = 'color: #' .$color[0] . ';';
		}

		if($color[1] != '')
		{
			$strStyle .= 'opacity: ' . $color[1] . ';';
		}

		// apply rotation
		if($this->fontAwesome_iconRotation != '')
		{
			$arrClasses[] = $this->fontAwesome_iconRotation;
		}

		// apply size
		if($this->fontAwesome_iconSize != '')
		{
			if($this->fontAwesome_iconStack)
			{
				$arrStack[] = $this->fontAwesome_iconSize;
			}
			else
			{
				$arrClasses[] = $this->fontAwesome_iconSize;
			}
		}

		$this->Template->icon .= 'icon-' . implode(' icon-', $arrClasses);
		$this->Template->iconStyle = ($strStyle == '' ?: (' style="' . $strStyle . '"'));

		if($this->fontAwesome_iconStack)
		{
			$this->Template->base = 'icon-' . $this->fontAwesome_iconStackBase;

			if($this->fontAwesome_iconStackBaseColor != '')
			{
				$this->Template->base .= ' icon-' . $this->fontAwesome_iconStackBaseColor;
			}

			$this->Template->stack = $this->Template->stack . 'icon-' . implode(' icon-', $arrStack);
		}
	}

}