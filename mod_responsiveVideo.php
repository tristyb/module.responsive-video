<?php

#@license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

/* Webhaus Responsive Video Embed */

defined('_JEXEC') or die;

// use joomla jquery, will load our files in AFTER jQuery
JHtml::_('jquery.framework');

$doc = JFactory::getDocument();
$doc->addScript(JURI::base(true) . '/modules/mod_responsivevideo/assets/js/responsiveVideo.min.js');

require_once(dirname(__FILE__).'/helper.php');

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$video = mod_responsiveVideoHelper::getVideo($params);

require(JModuleHelper::getLayoutPath('mod_responsivevideo'));
