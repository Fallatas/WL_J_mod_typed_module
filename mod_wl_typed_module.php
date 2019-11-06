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
    
    $data = modWL_Typed_Module_Helper::getTypedParams ($params);
    
	JHTML::_('script', 'mod_wl_typed_module/scripts.js', array('version' => 'auto', 'relative' => true));
	
    
    if($data->firstwords == ""){
        // Get a handle to the Joomla! application object
        $application = JFactory::getApplication();
    
    // Add a message to the message queue
        $application->enqueueMessage(JText::_('Bitte wählen Sie mindestens zwei Schlagwörter aus.'), 'Warning');
    }
    
    if($data->secondwords == ""){
        $application = JFactory::getApplication();
    
    // Add a message to the message queue
        $application->enqueueMessage(JText::_('Bitte wählen Sie mindestens zwei Schlagwörter aus.'), 'Warning');
    }

	// Check for a custom CSS file
    JHtml::_('stylesheet', 'mod_wl_typed_module/user.css', array('version' => 'auto', 'relative' => true));
    
    
   require JModuleHelper::getLayoutPath('mod_wl_typed_module', $params->get('layout', 'default'));