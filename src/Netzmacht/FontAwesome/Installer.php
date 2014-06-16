<?php

/**
 * @package    dev
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2014 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\FontAwesome;


class Installer
{

	/**
	 * Run installer
	 */
	public function run()
	{
		$this->createSymlink();
	}


	/**
	 * Create symlink
	 */
	protected function createSymlink()
	{
		$target  = TL_ROOT . '/composer/components/font-awesome';
		$link    = TL_ROOT . '/assets/font-awesome';
		$success = false;

		// dir or link already exists
		if(is_dir($link) || is_link($link)) {
			return;
		}

		if(is_dir($target)) {
			$success = symlink($target, $link);
		}

		if(!$success) {
			\Controller::log("Error during creating symlink '$target'", __METHOD__, 'TL_ERROR');
		}
		else {
			\Controller::log("Created symlink '$target'", __METHOD__, 'TL_INFO');
		}
	}

} 