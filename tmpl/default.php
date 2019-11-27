<?php
/**
 * @package    WL_TYPED_MODULE
 *
 * @author     Thomas Winterling <info@winterling-labs.com>
 * @copyright  Copyright (C) 2011 - 2019
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;

JHtml::_('stylesheet', 'mod_wl_typed_module/style.css', array('version' => 'auto', 'relative' => true));
JHtml::_('script', 'mod_wl_typed_module/typed.js', array('version' => 'auto', 'relative' => true));
JHtml::_('jQuery.Framework');

?>
<div class="wl_typed_module">
    <div class="wrap">
        <div class="headline">
            <div class="normal"><?php echo $params->get('text'); ?></div>
            <div class="normal"><span class="typed-animation" id="typed"></span><?php echo $params->get('endtext'); ?></div>
        </div>
</div>