<?php

#@license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

/* tristyb's Responsive Video Module */

defined('_JEXEC') or die;
$doc =& JFactory::getDocument();
$doc->addScript(JURI::base(true) . '/modules/mod_responsiveVideo/assets/js/fitvids.min.js');
require_once(dirname(__FILE__).'/helper.php');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$video = mod_responsiveVideoHelper::getVideo($params);
mod_responsiveVideoHelper::load_jquery($params);
require(JModuleHelper::getLayoutPath('mod_responsiveVideo'));