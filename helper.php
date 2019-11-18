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
    
    public function getTypedParams ($params)
        {
            /// Add Module Parameter
            jimport( 'joomla.application.module.helper' );
            $module = JModuleHelper::getModule('wl_typed_module');
            $module_id = $module->id;
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->select('params')
                ->from($db->quoteName('#__modules'))
                ->where('id = ' . $db->quote($module_id));
            $db->setQuery($query);
            $moduleparams = (json_decode($db->loadResult()));
            return $moduleparams;
    }


    public function setCssParams($params)
    {
        // Add CSS Parameter
        $document = JFactory::getDocument();
        $document->addStyleSheet(JURI::base() . 'media/mod_wl_typed_module/css/style.css');

        $style = '';

        $style .= '.wl_typed_module .normal p { font-size: ' . $params->get('fontsize') . 'px;}';
        $style .= '.wl_typed_module .normal p { color: ' . $params->get('fontcolor') . ';}';
        $style .= '.wl_typed_module .normal span { color: ' . $params->get('wordcolor') . ';}';
        $style .= '.wl_typed_module .normal span { font-size: ' . $params->get('textsize') .  'px;}';
        $style .= '.wl_typed_module { background: ' . $params->get('backgroundcolor') . ';}';

        $document->addStyleDeclaration( $style );
    }


    public function SetJsParams($data){

        $tagsPrams = (array) $data->fields;

        $tags = [];

        foreach ($tagsPrams as $tag)
        {
            array_push($tags, $tag->properties);
        }

        $tags = json_encode($tags);

        // Add JS Parameter
        JFactory::getDocument()->addScriptDeclaration("jQuery(document).ready(function () {  
                var typed = new Typed('#typed', {
                strings: " . $tags . ",
                typeSpeed: $data->fontspeed,
                backDelay: $data->backdelay,
                startDelay: $data->startdelay,
                backSpeed: $data->backspeed,
                loop: $data->loop,
                showCursor: $data->cursor
            });
            
    });");

    }

}