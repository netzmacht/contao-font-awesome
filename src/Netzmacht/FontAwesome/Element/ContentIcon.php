<?php
/**
 * Created by JetBrains PhpStorm.
 * User: david
 * Date: 11.07.13
 * Time: 09:51
 * To change this template use File | Settings | File Templates.
 */

namespace Netzmacht\FontAwesome\Element;


/**
 * Class IconElement
 * @package Netzmacht\FontAwesome
 */
class ContentIcon extends \ContentElement
{
    protected $strTemplate = 'ce_icon';

    /**
     *
     */
    protected function compile()
    {
        $this->Template->stackBaseOnTop = $this->fontAwesome_iconStackBaseTop;
        $this->Template->stack = false;

        $classes = array($this->fontAwesome_icon);
        $stack = array();

        // convert style
        $this->fontAwesome_iconStyle = deserialize($this->fontAwesome_iconStyle);

        if(is_array($this->fontAwesome_iconStyle)) {
            foreach($this->fontAwesome_iconStyle as $style) {
                $classes[] = $style;
            }
        }

        $color = deserialize($this->fontAwesome_iconColor);
        $style = '';

        if($color[0] != '') {
            $style = 'color: #' .$color[0] . ';';
        }

        if($color[1] != '') {
            $style .= 'opacity: ' . $color[1] . ';';
        }

        // apply rotation
        if($this->fontAwesome_iconRotation != '') {
            $classes[] = $this->fontAwesome_iconRotation;
        }

        // apply size
        if($this->fontAwesome_iconSize != '') {
            if($this->fontAwesome_iconStack) {
                $stack[] = $this->fontAwesome_iconSize;
            }
            else {
                $classes[] = $this->fontAwesome_iconSize;
            }
        }

        $this->Template->icon       .= 'fa-' . implode(' fa-', $classes);
        $this->Template->iconStyle = ($style == '' ? '' : (' style="' . $style . '"'));

        if($this->fontAwesome_iconStack) {
            $this->Template->stack = 'fa-stack';
            $this->Template->base  = 'fa-' . $this->fontAwesome_iconStackBase;
            $this->Template->icon  = $this->Template->icon . ' fa-stack-1x';

            if($this->fontAwesome_iconStackBaseColor != '') {
                $this->Template->base .= ' fa-' . $this->fontAwesome_iconStackBaseColor . ' fa-stack-2x';
            }
            
            if($stack) {
                $this->Template->stack = $this->Template->stack . 'fa-' . implode(' fa-', $stack);    
            }
        }
    }

}
