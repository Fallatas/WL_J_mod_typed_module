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

        $style .= '.wl_typed_module { background: '.$params->get('wordcolor').';}';

        $document->addStyleDeclaration( $style );
    }



}