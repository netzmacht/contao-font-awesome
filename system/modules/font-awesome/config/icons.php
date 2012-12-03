<?php

$GLOBALS['ICON_REPLACER'] = array
(
	// define replacement of the header icons
	'header' => array
	(
		'target' => '#header span a',
		'addSpace' => true, 

		'imageIcons' => array
		(
			array('refresh', 'dbcheck16.png'),
			array('download-alt', 'install16.png'),
		),
		
		'styleIcons' => array
		(
			// header_user_container
			array('user', 'header_user'),
			array('external-link', 'header_preview'),
			array('home', 'header_home'),
			array('signout', 'header_logout'),			
		),
		
		'listenTo' => array 
		(
			array('document', 'domready')
		),		
	),
	
	// define replacement of the tl_buttons icons (header icons)
	'buttons' => array
	(
		'target' => '#tl_buttons a',
		'addSpace' => true, 

		'imageIcons' => array
		(
			array('refresh', 'dbcheck16.png'),
			array('download-alt', 'install16.png'),
		),
		
		'styleIcons' => array
		(
			// tl_buttons
			array('circle-arrow-left', 'header_back'),
			array('plus-sign', 'header_toggle'),
			array('plus', 'header_new'),
			array('sitemap', 'header_edit_all'),
			array('rss', 'header_rss'),
			array('remove-sign', 'header_clipboard'),
			array('refresh', 'header_sync'),
			array('folder-close', 'header_new_folder'),
			array('download-alt', 'header_theme_import'),
			array('download-alt', 'header_css_import'),		
		),
		
		'listenTo' => array 
		(
			array('document', 'domready')
		),		
	),


	// define replacement of the context icons (right listed one)
	'context' => array
	(
		'target' => '.tl_content_right img, .tl_right img, .tl_right_nowrap img',
		'addSpace' => false, 

		'imageIcons' => array
		(
			array('share', 'article.gif'),
			array('copy', 'copychilds.gif'),
			array('copy', 'copychilds_.gif', array('addClass' => 'icon-disabled')),
			array('ok-sign', 'apply.gif'),
			array('plus-sign', 'copy.gif'),
			array('sort', 'cut.gif'),
			array('trash', 'delete.gif'),
			array('pencil', 'edit.gif'),
			array('file', 'editor.gif'),
			array('minus', 'editor_.gif', array('addClass' => 'icon-disabled')),
			array('star-empty', 'featured_.gif'),
			array('star', 'featured.gif'),
			array('cogs', 'header.gif'),
			array('eye-close', 'invisible.gif'),	
			array('plus', 'new.gif'),
			array('caret-down', 'pasteafter.gif'),
			array('caret-down', 'pasteafter_.gif', array('addClass' => 'icon-disabled')),
			array('caret-right', 'pasteinto.gif'),
			array('caret-right', 'pasteinto_.gif', array('addClass' => 'icon-disabled')),
			array('unlock', 'protect.gif'),
			array('lock', 'protect_.gif'),
			array('info-sign', 'show.gif'),	
			array('undo', 'undo.gif'),
			array('eye-open', '/visible.gif'),
		),
		
		'styleIcons' => array
		(
		),
		
		'listenTo' => array 
		(
			array('window', 'ajax_change'),
			array('document', 'domready'),
		),		
	),


	// define replacement of published state icons (header icons)
	'published' => array
	(
		'target' => '.tl_content .cte_type',
		'addSpace' => true, 

		'imageIcons' => array
		(
		),
		
		'styleIcons' => array
		(
			array('eye-open', 'published'),
			array('eye-close', 'unpublished'),
		),
		
		'listenTo' => array 
		(
			array('window', 'ajax_change'),
			array('document', 'domready'),
		),		
	),
	
		// define replacement of published state icons (header icons)
	'navigation' => array
	(
		'target' => '#tl_navigation .tl_level_2 a, #tl_navigation img',
		'addSpace' => false, 

		'imageIcons' => array
		(
			array('minus-sign', 'modMinus.gif', array('size' => 'normal', 'onlyHide' => true)),
			array('plus-sign', 'modPlus.gif', array('size' => 'normal', 'onlyHide' => true)),
		),
		
		'styleIcons' => array
		(
			// core module icons
			array('pencil', 'article'),
			array('random', 'autoload'),
			array('comments', 'comments'),
			array('calendar', 'calendar'),
			array('magic', 'extension'),
			array('question-sign', 'faq'),
			array('folder-open', 'files'),
			array('list-alt', 'form'),
			array('group', 'group'),
			array('warning-sign', 'labels'),
			array('bullhorn', 'log'),
			array('user-md', 'member'),
			array('tasks', 'maintenance'),
			array('group', 'mgroup'),
			array('envelope', 'newsletter'),
			array('file', 'news'),
			array('sitemap', 'page'),
			array('dashboard', 'repository_catalog'),
			array('cogs', 'repository_manager'),
			array('cog', 'settings'),
			array('qrcode', 'themes'),
			array('paste', 'tpl_editor'),
			array('undo', 'undo'),
			array('user', 'user'),
			
			//third party modules
			array('filter', 'assetic_config'),
			array('bar-chart', 'be_piwikcharts'),
			array('save', 'BackupDB'),
			array('magic', 'css'),
			array('globe', 'dlh_googlemaps'),
			array('pencil', 'edit'),
			array('wrench', 'htaccess'),
			array('columns', 'layout'),
			array('th-large', 'modules'),
			array('plus', 'theme_plus_javascript'),
			array('plus', 'theme_plus_stylesheet'),
			array('plus', 'theme_plus_variable'),			
		),
		
		'listenTo' => array 
		(
			array('window', 'ajax_change'),
			array('document', 'domready'),
		),		
	),
);
