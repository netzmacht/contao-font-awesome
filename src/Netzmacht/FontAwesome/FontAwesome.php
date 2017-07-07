<?php

/**
 * 
 * @package   font-awesome 
 * @author    David Molineus <http://www.netzmacht.de>
 * @license   GNU/LGPL
 * @copyright Copyright 2012 David Molineus netzmacht creative
 *
 */

namespace Netzmacht\FontAwesome;

use Contao\LayoutModel;

/**
 * icon replacer adds javascript to backend template if the icon replacer is enabled
 *
 */
class FontAwesome
{

    /**
     * @var array
     */
    protected $icons = array();


    /**
     * @var bool
     */
    private static $debugMode;


    /**
     * Construct
     */
    public function __construct()
    {
        foreach($this->getAllIcons() as $group) {
            $this->icons = array_merge($this->icons, $group);
        }

        $this->detectDebugMode();
    }

    /**
     * @param $objPage
     * @param $objLayout
     */
    public function hookGetPageLayout($objPage, $objLayout)
    {
        /** @var LayoutModel $objLayout */
        if($objLayout->fontAwesome) {
            if (version_compare(VERSION, '4.0', '<')) {
                $GLOBALS['TL_CSS']['font-awesome'] = 'assets/components/font-awesome/css/' . $objLayout->fontAwesome;
            } else {
                $GLOBALS['TL_CSS']['font-awesome'] = 'assets/font-awesome/css/' . $objLayout->fontAwesome;
            }
        }
    }


    /**
     * replace icon insert tag
     *
     * Following formats are supported
     * {{fa::phone}}
     * {{fa::phone 4x muted}}                       every entry sperated by space get an fa- prefix
     * {{fa::phone rotate-90 large::pull-left}}     2nd param is added as class without prefix
     *
     * @param $tag
     * @param $cache
     * @return string
     */
    public function replaceInsertTag($tag, $cache)
    {
        $parts = explode('::', $tag);

        if($parts[0] == $GLOBALS['TL_CONFIG']['fontAwesomeInsertTag']) {
            $class = str_replace(' ', ' fa-', $parts[1]);

            if(static::$debugMode) {
                $icon = trimsplit(' ', $parts[1]);

                if(!$this->iconExists($icon[0])) {
                    return sprintf('<span style="color:red;">[fa-%s]</span>', $class);
                }
            }

            if(isset($parts[2])) {
                $class .= ' ' . $parts[2];
            }

            return sprintf(
                $GLOBALS['FONT-AWESOME']['template'],
                $class
            );
        }

        return false;
    }


    /**
     * @return mixed
     */
    public function getAllIcons()
    {
        return include TL_ROOT . '/system/modules/font-awesome/config/icons/icons.php';
    }


    /**
     * @param $icon
     * @return bool
     */
    public function iconExists($icon)
    {
        return in_array($icon, $this->icons);
    }


    /**
     * @param $dc
     * @return string
     */
    public function generateIcon($dc)
    {
        $value = $dc->activeRecord->{$dc->field};

        if($value !== null) {
            return sprintf($GLOBALS['FONT-AWESOME']['template'], $value);
        }

        return '';
    }


    /**
     * Detect debug mode
     */
    protected function detectDebugMode()
    {
        if (static::$debugMode !== null) {
            return;
        }

        if($GLOBALS['TL_CONFIG']['debugMode']) {
            static::$debugMode = $GLOBALS['TL_CONFIG']['debugMode'];
            return;
        }

        if(class_exists('Bit3\Contao\ThemePlus\ThemePlusEnvironment')) {
            $className = 'Bit3\Contao\ThemePlus\ThemePlusEnvironment';
        }
        elseif(class_exists('ThemePlus\ThemePlus')) {
            $className = 'ThemePlus\ThemePlus';

        } else {
            return;
        }

        // Initiate the user because Theme+ will trigger the database. Force Contao stack.
        if (TL_MODE === 'FE') {
            \FrontendUser::getInstance();
        }

        static::$debugMode = call_user_func(array($className, 'isDesignerMode'));
    }
}

