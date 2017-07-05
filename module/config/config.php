<?php

/**
 * 
 * @package   font-awesome 
 * @author    David Molineus <http://www.netzmacht.de>
 * @license   GNU/LGPL 
 * @copyright Copyright 2012 David Molineus netzmacht creative 
 * 
 */


/**
 * content element
 */
$GLOBALS['TL_CTE']['texts']['fontAwesomeIcon'] = 'Netzmacht\FontAwesome\Element\ContentIcon';

/**
 * events
 */
$GLOBALS['TL_EVENTS']['form-helper.generate-widget'][] = array(
    array('Netzmacht\FontAwesome\EventSubscriber', 'handleWidgetGenerateEvent'),
    -1
);

$GLOBALS['TL_EVENTS']['form-helper.generate-view'][] = array(
    array('Netzmacht\FontAwesome\EventSubscriber', 'handleViewEvent'),
    -1
);


/**
 * hooks
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('Netzmacht\FontAwesome\FontAwesome', 'replaceInsertTag');
$GLOBALS['TL_HOOKS']['getPageLayout'][]     = array('Netzmacht\FontAwesome\FontAwesome', 'hookGetPageLayout');

// load icons config
if(TL_MODE == 'BE') 
{
	$GLOBALS['TL_CSS']['font-awesome'] = 'assets/components/font-awesome/css/font-awesome.min.css|all|static';
}

// which insert tag will be used
$GLOBALS['TL_CONFIG']['fontAwesomeInsertTag'] = 'fa';

// support of icon handling of Bootstrap extension
$GLOBALS['FONT-AWESOME'] = array
(
	'path'       => 'system/modules/font-awesome/config/icons/icons.php',
	'stylesheet' => 'assets/components/font-awesome/css/font-awesome.css|all|static',
	'template'   => '<i class="fa fa-%s"></i>',
);

$GLOBALS['BOOTSTRAP']['icons']['sets']['font-awesome'] = $GLOBALS['FONT-AWESOME'];
