<?php

/**
 * @package    WL TYPED MODUL
 *
 * @author     Thomas Winterling <info@winterling-labs.com>
 * @copyright  Copyright (C) 2005 - 2019. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;

/**
 * Helper for mod_wl_typed_module
 *
 * @since  Version 1.0.0.0
 */
class ModWL_Typed_Module_Helper
{   

    public function setCssParams($params)
    {
        // Add CSS Parameter
        $document = JFactory::getDocument();
        $document->addStyleSheet(JURI::base() . 'media/mod_wl_typed_module/css/style.css');

        $style = '';

        $style .= '.wl_typed_module p { font-size: ' . $params->get('fontsize') . 'px;}';
        $style .= '.wl_typed_module p { color: ' . $params->get('fontcolor') . ';}';
        $style .= '.wl_typed_module span { color: ' . $params->get('wordcolor') . ';}';
        $style .= '.wl_typed_module span { font-size: ' . $params->get('textsize') .  'px;}';
        $style .= '.wl_typed_module { background: ' . $params->get('backgroundcolor') . ';}';

        $document->addStyleDeclaration( $style );
    }


    public function SetJsParams($params){

        $tagsPrams = (array) $params->get('fields');

        $tags = [];

        foreach ($tagsPrams as $tag)
        {
            array_push($tags, $tag->properties);
        }

        $tags = json_encode($tags);

        $typespeed = $params->get('fontspeed');
        $backDelay = $params->get('backdelay');
        $startDelay = $params->get('startdelay');
        $backSpeed = $params->get('backspeed');
        $loop = $params->get('loop');
        $showCursor = $params->get('cursor');

        // Add JS Parameter
        JFactory::getDocument()->addScriptDeclaration("jQuery(document).ready(function () {  
                var typed = new Typed('#typed', {
                strings: " . $tags . ",
                typeSpeed: $typespeed,
                backDelay: $backDelay,
                startDelay: $startDelay,
                backSpeed: $backSpeed,
                loop: $loop,
                showCursor: $showCursor
            });
            
    });");

    }

}