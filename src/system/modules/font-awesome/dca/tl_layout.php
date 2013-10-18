<?php
/**
 * Created by JetBrains PhpStorm.
 * User: david
 * Date: 18.10.13
 * Time: 09:32
 * To change this template use File | Settings | File Templates.
 */


\MetaPalettes::appendFields('tl_layout', 'style', array('fontAwesome'));

$GLOBALS['TL_DCA']['tl_layout']['fields']['fontAwesome'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_layout']['fontAwesome'],
	'inputType' => 'select',
	'exclude'   => true,
	'eval'      => array(
		'tl_class'           => 'w50',
		'includeBlankOption' => true,
	),
	'options'   => array
	(
		'font-awesome.css',
		'font-awesome.min.css',
	),
	'sql'       => "varchar(32) NOT NULL default ''"
);