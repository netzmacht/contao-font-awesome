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


use Netzmacht\Bootstrap\Helper\Icons;
use Netzmacht\FormHelper\Event\Events;
use Netzmacht\FormHelper\Event\GenerateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EventSubscriber implements EventSubscriberInterface
{
	/**
	 * Returns an array of event names this subscriber wants to listen to.
	 *
	 * The array keys are event names and the value can be:
	 *
	 *  * The method name to call (priority defaults to 0)
	 *  * An array composed of the method name to call and the priority
	 *  * An array of arrays composed of the method names to call and respective
	 *    priorities, or 0 if unset
	 *
	 * For instance:
	 *
	 *  * array('eventName' => 'methodName')
	 *  * array('eventName' => array('methodName', $priority))
	 *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
	 *
	 * @return array The event names to listen to
	 *
	 * @api
	 */
	public static function getSubscribedEvents()
	{
		return array(
			Events::GENERATE => array('addIcon', -500),
		);
	}


	/**
	 * @param GenerateEvent $event
	 */
	public function addIcon(GenerateEvent $event)
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
			$icon = Icons::generateIcon($widget->bootstrap_icon, 'fa-fw');

			if($widget->bootstrap_iconPosition == 'right') {
				$inputGroup->setRight($icon);
			}
			else {
				$inputGroup->setLeft($icon);
			}
		}
	}

} 