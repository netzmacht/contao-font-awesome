<?php

$GLOBALS['TL_DCA']['tl_content']['metapalettes']['fontAwesomeIcon'] = array(
	'type'       => array(
		'type',
	),

	'icon'       => array(
		'fontAwesome_icon',
		'fontAwesome_iconColor',
		'fontAwesome_iconRotation',
		'fontAwesome_iconSize',
		'fontAwesome_iconStyle',
	),

	'stack'      => array(
		':hide', 'fontAwesome_iconStack'
	),

	'expert' => array(
		':hide',
		'guests',
		'cssID',
	),
);

$GLOBALS['TL_DCA']['tl_content']['metasubpalettes']['fontAwesome_iconStack'] = array(
	'fontAwesome_iconStackBase',
	'fontAwesome_iconStackBaseColor',
	'fontAwesome_iconStackBaseOnTop',
);


$GLOBALS['TL_DCA']['tl_content']['fields']['fontAwesome_icon'] = array
(
	'label'            => &$GLOBALS['TL_LANG']['tl_content']['fontAwesome_icon'],
	'inputType'        => 'icon',
	'exclude'          => true,
	'options_callback' => array('Netzmacht\FontAwesome\FontAwesome', 'getAllIcons'),
	'eval'             => array(
		'chosen'         => true,
		'submitOnChange' => true,
		'tl_class'       => 'w50 wizard',
	),
	'wizard'           => array(
		array('Netzmacht\FontAwesome\FontAwesome', 'generateIcon'),
	),
	'sql'              => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['fontAwesome_iconRotation'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['fontAwesome_iconRotation'],
	'inputType' => 'select',
	'exclude'   => true,
	'eval'      => array(
		'tl_class'           => 'w50',
		'includeBlankOption' => true,
	),
	'options'   => array('rotate-90', 'rotate-180', 'rotate-270', 'flip-horizontal', 'flip-vertical'),
	'sql'       => "varchar(16) NOT NULL default ''"
);


$GLOBALS['TL_DCA']['tl_content']['fields']['fontAwesome_iconSize'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['fontAwesome_iconSize'],
	'inputType' => 'select',
	'exclude'   => true,
	'eval'      => array(
		'tl_class'           => 'w50',
		'includeBlankOption' => true,
	),
	'options'   => array('large', '2x', '3x', '4x', '5x'),
	'sql'       => "varchar(8) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['fontAwesome_iconStyle'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['fontAwesome_iconStyle'],
	'inputType' => 'checkbox',
	'exclude'   => true,
	'eval'      => array(
		'multiple' => true,
		'tl_class' => 'clr'
	),
	'options'   => array('border', 'spin'),
	'sql'       => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['fontAwesome_iconColor'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['fontAwesome_iconColor'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>6, 'multiple'=>true, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['fontAwesome_iconStack'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['fontAwesome_iconStack'],
	'inputType' => 'checkbox',
	'exclude'   => true,
	'eval'      => array(
		'submitOnChange' => true,
	),
	'sql'       => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['fontAwesome_iconStackBase'] = array
(
	'label'            => &$GLOBALS['TL_LANG']['tl_content']['fontAwesome_iconStackBase'],
	'inputType'        => 'icon',
	'exclude'          => true,
	'options_callback' => array('Netzmacht\FontAwesome\FontAwesome', 'getAllIcons'),
	'eval'             => array(
		'chosen'         => true,
		'tl_class'       => 'w50 wizard',
	),
	'wizard'           => array(
		array('Netzmacht\FontAwesome\FontAwesome', 'generateIcon'),
	),
	'sql'              => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['fontAwesome_iconStackBaseColor'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['fontAwesome_iconStackBaseColor'],
	'inputType' => 'select',
	'exclude'   => true,
	'eval'      => array(
		'includeBlankOption' => true,
		'tl_class'           => 'w50',
	),
	'options'   => array('muted', 'light', 'dark'),
	'sql'       => "blob NULL"
);