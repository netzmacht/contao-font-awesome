<?php

// header icons
$GLOBALS['ICON_REPLACER']['header']['target']       = '#header span a';
$GLOBALS['ICON_REPLACER']['header']['addSpace']     = true;
$GLOBALS['ICON_REPLACER']['header']['imageIcons'][] = array('refresh', 'dbcheck16.png');
$GLOBALS['ICON_REPLACER']['header']['imageIcons'][] = array('download', 'install16.png');
$GLOBALS['ICON_REPLACER']['header']['styleIcons'][] = array('user', 'header_user');
$GLOBALS['ICON_REPLACER']['header']['styleIcons'][] = array('external-link', 'header_preview');
$GLOBALS['ICON_REPLACER']['header']['styleIcons'][] = array('home', 'header_home');
$GLOBALS['ICON_REPLACER']['header']['styleIcons'][] = array('sign-out', 'header_logout');
$GLOBALS['ICON_REPLACER']['header']['listenTo'][]   = array('document', 'domready');

// tl_buttons
$GLOBALS['ICON_REPLACER']['buttons']['target']       = '#tl_buttons a, #tl_buttons_a a';
$GLOBALS['ICON_REPLACER']['buttons']['addSpace']     = true;
$GLOBALS['ICON_REPLACER']['buttons']['imageIcons'][] = array('refresh', 'dbcheck16.png');
$GLOBALS['ICON_REPLACER']['buttons']['imageIcons'][] = array('download', 'install16.png');
$GLOBALS['ICON_REPLACER']['buttons']['imageIcons'][] = array('refresh', 'database_update.png');
$GLOBALS['ICON_REPLACER']['buttons']['imageIcons'][] = array('cog', 'settings_dialog.png');
$GLOBALS['ICON_REPLACER']['buttons']['imageIcons'][] = array('upload', 'composer_update.png');
$GLOBALS['ICON_REPLACER']['buttons']['imageIcons'][] = array('code', 'experts_mode.png');
$GLOBALS['ICON_REPLACER']['buttons']['imageIcons'][] = array('eraser', 'clear_composer_cache.png');
$GLOBALS['ICON_REPLACER']['buttons']['imageIcons'][] = array('minus-circle', 'undo_migration.png');

$GLOBALS['ICON_REPLACER']['buttons']['styleIcons'][] = array('arrow-circle-left', 'header_back');
$GLOBALS['ICON_REPLACER']['buttons']['styleIcons'][] = array('plus-circle', 'header_toggle');
$GLOBALS['ICON_REPLACER']['buttons']['styleIcons'][] = array('plus', 'header_new');
$GLOBALS['ICON_REPLACER']['buttons']['styleIcons'][] = array('sitemap', 'header_edit_all');
$GLOBALS['ICON_REPLACER']['buttons']['styleIcons'][] = array('rss', 'header_rss');
$GLOBALS['ICON_REPLACER']['buttons']['styleIcons'][] = array('times-circle', 'header_clipboard');
$GLOBALS['ICON_REPLACER']['buttons']['styleIcons'][] = array('refresh', 'header_sync');
$GLOBALS['ICON_REPLACER']['buttons']['styleIcons'][] = array('folder', 'header_new_folder');
$GLOBALS['ICON_REPLACER']['buttons']['styleIcons'][] = array('download', 'header_theme_import');
$GLOBALS['ICON_REPLACER']['buttons']['styleIcons'][] = array('download', 'header_css_import');
$GLOBALS['ICON_REPLACER']['buttons']['styleIcons'][] = array('shopping-cart', 'header_store');
$GLOBALS['ICON_REPLACER']['buttons']['listenTo'][]   = array('document', 'domready');

// context icons (right listed one)
$GLOBALS['ICON_REPLACER']['context']['target']       = '.tl_content_right img, .tl_right img, .tl_right_nowrap img';
$GLOBALS['ICON_REPLACER']['context']['addSpace']     = false;
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('share', 'article.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('files-o', 'copychilds.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('files-o', 'copychilds_.gif', array('addClass' => 'icon-disabled'));
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('check-circle', 'apply.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('plus-circle', 'copy.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('sort', 'cut.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('trash-o', 'delete.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('pencil', 'edit.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('file', 'editor.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('minus', 'editor_.gif', array('addClass' => 'icon-disabled'));
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('star-o', 'featured_.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('star', 'featured.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('cogs', 'header.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('eye-slash', 'invisible.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('plus', 'new.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('caret-down', 'pasteafter.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('caret-down', 'pasteafter_.gif', array('addClass' => 'icon-disabled'));
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('caret-right', 'pasteinto.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('caret-right', 'pasteinto_.gif', array('addClass' => 'icon-disabled'));
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('unlock', 'protect.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('lock', 'protect_.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('info-circle', 'show.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('undo', 'undo.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('eye', '/visible.gif');
$GLOBALS['ICON_REPLACER']['context']['imageIcons'][] = array('cogs', 'modules.gif');
$GLOBALS['ICON_REPLACER']['context']['listenTo'][]   = array('window', 'ajax_change');
$GLOBALS['ICON_REPLACER']['context']['listenTo'][]   = array('document', 'domready');

// published icons
$GLOBALS['ICON_REPLACER']['published']['target']       = '.tl_content .cte_type';
$GLOBALS['ICON_REPLACER']['published']['addSpace']     = true;
$GLOBALS['ICON_REPLACER']['published']['styleIcons'][] = array('eye', 'published');
$GLOBALS['ICON_REPLACER']['published']['styleIcons'][] = array('eye-slash', 'unpublished');
$GLOBALS['ICON_REPLACER']['published']['listenTo'][]   = array('window', 'ajax_change');
$GLOBALS['ICON_REPLACER']['published']['listenTo'][]   = array('document', 'domready');

// navigation icons
$GLOBALS['ICON_REPLACER']['navigation']['target']       = '#tl_navigation .tl_level_2 a, #tl_navigation img';
$GLOBALS['ICON_REPLACER']['navigation']['addSpace']     = false;
$GLOBALS['ICON_REPLACER']['navigation']['imageIcons'][] = array('minus-circle', 'modMinus.gif', array('size' => 'normal', 'onlyHide' => true));
$GLOBALS['ICON_REPLACER']['navigation']['imageIcons'][] = array('plus-circle', 'modPlus.gif', array('size' => 'normal', 'onlyHide' => true));

// core modules
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('pencil', 'article');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('random', 'autoload');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('comments', 'comments');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('calendar', 'calendar');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('magic', 'extension');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('question-circle', 'faq');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('folder-open', 'files');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('list-alt', 'form');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('group', 'group');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('warning', 'labels');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('bullhorn', 'log');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('user-md', 'member');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('tasks', 'maintenance');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('group', 'mgroup');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('envelope', 'newsletter');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('file', 'news');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('sitemap', 'page');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('dashboard', 'repository_catalog');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('cogs', 'repository_manager');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('cog', 'settings');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('qrcode', 'themes');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('paste', 'tpl_editor');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('undo', 'undo');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('user', 'user');

//third party modules
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('filter', 'assetic_config');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('bar-chart-o', 'be_piwikcharts');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('save', 'BackupDB');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('magic', 'css');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('globe', 'dlh_googlemaps');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('pencil', 'edit');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('wrench', 'htaccess');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('columns', 'layout');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('th-large', 'modules');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('plus', 'theme_plus_javascript');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('plus', 'theme_plus_stylesheet');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('plus', 'theme_plus_variable');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('clock-o', 'cron');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('columns', 'columnset');
$GLOBALS['ICON_REPLACER']['navigation']['styleIcons'][] = array('puzzle-piece', 'composer');

$GLOBALS['ICON_REPLACER']['navigation']['listenTo'][] = array('window', 'ajax_change');
$GLOBALS['ICON_REPLACER']['navigation']['listenTo'][] = array('document', 'domready');

// tl_left icons
$GLOBALS['ICON_REPLACER']['inline']['target']   = '.tl_folder .tl_left img, .tl_folder_top .tl_left img';
$GLOBALS['ICON_REPLACER']['inline']['addSpace'] = false;

$GLOBALS['ICON_REPLACER']['inline']['imageIcons'][] = array('globe', 'pagemounts.gif', array('size' => 'normal', 'onlyHide' => true));
$GLOBALS['ICON_REPLACER']['inline']['imageIcons'][] = array('globe', 'root.gif', array('size' => 'normal', 'onlyHide' => true));
$GLOBALS['ICON_REPLACER']['inline']['imageIcons'][] = array('globe', 'root_1.gif', array('size' => 'normal', 'onlyHide' => true, 'addClass' => 'icon-disabled'));

$GLOBALS['ICON_REPLACER']['inline']['listenTo'][] = array('window', 'ajax_change');
$GLOBALS['ICON_REPLACER']['inline']['listenTo'][] = array('document', 'domready');