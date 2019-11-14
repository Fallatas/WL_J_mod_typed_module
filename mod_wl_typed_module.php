<?php
/**
 * @package     mod_typed_module
 * @author      Thomas Winterling
 * @email       info@winterling-labs.com
 * @copyright   Copyright (C) 2005 - 2013, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Helper\ModuleHelper;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';   // Helper

HTMLHelper::_('script', 'mod_wl_typed_module/scripts.js', array('version' => 'auto', 'relative' => true));

$data = modWL_Typed_Module_Helper::getTypedParams ($params);

modWL_Typed_Module_Helper::setCssParams ($params);

modWL_Typed_Module_Helper::SetJsParams ($data);

if($data->words == ""){

    // Get a handle to the Joomla! application object
    $application = Factory::getApplication();

    // Add a message to the message queue
    $application->enqueueMessage(Text::_('MOD_WL_TYPED_MODULE_PLACEHOLDER'), 'Warning');
}

	// Check for a custom CSS file
    HTMLHelper::_('stylesheet', 'mod_wl_typed_module/user.css', array('version' => 'auto', 'relative' => true));
    
    
   require ModuleHelper::getLayoutPath('mod_wl_typed_module', $params->get('layout', 'default'));