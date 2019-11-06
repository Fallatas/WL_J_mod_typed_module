<?php
/**
 * @package     mod_typed_module
 * @author      Thomas Winterling
 * @email       info@winterling-labs.com
 * @copyright   Copyright (C) 2005 - 2013, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';   // Helper

JHTML::_('script', 'mod_wl_typed_module/scripts.js', array('version' => 'auto', 'relative' => true));

$data = modWL_Typed_Module_Helper::getTypedParams ($params);

$css = modWL_Typed_Module_Helper::setCssParams ($params);


JFactory::getDocument()->addScriptDeclaration("jQuery(document).ready(function () {  
                var typed = new Typed('#typed', {
                strings: ['$data->firstwords', '$data->secondwords', '$data->thirdwords'],
                typeSpeed: $data->fontspeed,
                backDelay: 750,
                loop: $data->loop,
                loopCount: $data->loopcount,
                showCursor: $data->cursor
            });
    });");

if($data->firstwords == ""){
    // Get a handle to the Joomla! application object
    $application = JFactory::getApplication();

// Add a message to the message queue
    $application->enqueueMessage(JText::_('MOD_WL_TYPED_MODULE_PLACEHOLDER'), 'Warning');
}

if($data->secondwords == ""){
    $application = JFactory::getApplication();

// Add a message to the message queue
    $application->enqueueMessage(JText::_('MOD_WL_TYPED_MODULE_PLACEHOLDER'), 'Warning');
}


	// Check for a custom CSS file
    JHtml::_('stylesheet', 'mod_wl_typed_module/user.css', array('version' => 'auto', 'relative' => true));
    
    
   require JModuleHelper::getLayoutPath('mod_wl_typed_module', $params->get('layout', 'default'));