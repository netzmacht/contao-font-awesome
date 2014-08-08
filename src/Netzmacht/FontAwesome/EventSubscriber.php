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


use Netzmacht\Bootstrap\Form\InputGroup;
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
		$template   = static::getIconSetTemplateWhenEnabled($inputGroup, $widget);

		if(!$template) {
			return;
		}

		$icon = sprintf($template, $widget->bootstrap_icon . ' fa-fw');

		if($widget->bootstrap_iconPosition == 'right') {
			$inputGroup->setRight($icon);
		}
		else {
			$inputGroup->setLeft($icon);
		}
	}


	/**
	 * @param $inputGroup
	 * @param $widget
	 * @return bool|string
	 */
	private static function getIconSetTemplateWhenEnabled($inputGroup, $widget)
	{
		// wrapper is no input group, do nothing
		if(!$inputGroup || !$inputGroup instanceof \Netzmacht\Bootstrap\Form\InputGroup) {
			return false;
		}

		if(static::isLegacyBootstrapEnabled()) {
			$name     = $GLOBALS['BOOTSTRAP']['icons']['active'];
			$template = $GLOBALS['BOOTSTRAP']['icons']['sets']['font-awesome']['template'];
		}
		elseif(static::isBootstrapEnabled()) {
			$iconSet  = \Netzmacht\Bootstrap\Core\Bootstrap::getIconSet();
			$name     = $iconSet->getIconSetName();
			$template = $iconSet->getTemplate();
		}
		else {
			return false;
		}

		// other icon set is loaded
		if($name != 'font-awesome') {
			return false;
		}

		// fa-fw is applied in the icon set templates
		if(strpos($template, 'fa-fw') !== false) {
			return false;
		}

		if(!$widget->bootstrap_addIcon) {
			return false;
		}

		return $template;
	}


	/**
	 *
	 */
	private static function isLegacyBootstrapEnabled()
	{
		// no input group or no bootstrap extension available or not enabled
		if(class_exists('Netzmacht\Bootstrap\Bootstrap') && \Netzmacht\Bootstrap\Bootstrap::isEnabled()) {
			return true;

		}

		return false;
	}


	/**
	 *
	 */
	private static function isBootstrapEnabled()
	{
		if(class_exists('Netzmacht\Bootstrap\Core\Bootstrap') && \Netzmacht\Bootstrap\Core\Bootstrap::isEnabled()) {
			return true;
		}

		return false;
	}

}