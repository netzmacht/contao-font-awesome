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

class BackendTemplate extends Contao\BackendTemplate
{
	/**
	 * extend the parse method to assign hook again
	 * need that to force the repository manager to handle icon replacement
	 * by default it removes all hooks
	 */
	public function parse()
	{
		// do not allow repository to remove hook for icon rendering
		$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('Netzmacht\FontAwesome', 'onParseTemplate');

		return parent::parse();
	}
}

