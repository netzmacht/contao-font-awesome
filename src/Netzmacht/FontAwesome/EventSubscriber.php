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


use Netzmacht\FormHelper\Event\GenerateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EventSubscriber
{

	/**
	 * @param GenerateEvent $event
	 */
	public static function addIcon(GenerateEvent $event)
	{
		$widget 	= $event->getWidget();
		$inputGroup = $event->getContainer()->getWrapper();

		// no input group or no bootstrap extension available or not enabled
		if(!$inputGroup || ! class_exists('Netzmacht\Bootstrap\Bootstrap') || !\Netzmacht\Bootstrap\Bootstrap::isEnabled()) {
			return;
		}

		// other icon set is loaded
		if($GLOBALS['BOOTSTRAP']['icons']['active'] != 'font-awesome') {
			return;
		}

		// fa-fw is applied in the icon set templates
		if(strpos($GLOBALS['BOOTSTRAP']['icons']['sets']['font-awesome']['template'], 'fa-fw') !== false) {
			return;
		}

		// add icon
		if($widget->bootstrap_addIcon) {
			$icon = sprintf($GLOBALS['BOOTSTRAP']['icons']['sets']['font-awesome']['template'], $widget->bootstrap_icon . ' fa-fa');

			if($widget->bootstrap_iconPosition == 'right') {
				$inputGroup->setRight($icon);
			}
			else {
				$inputGroup->setLeft($icon);
			}
		}
	}

} 