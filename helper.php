<?php

#@license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

defined('_JEXEC') or die;

class mod_responsiveVideoHelper{

	public function getVideo($params){
		$videoCode = $params->get('embed_code');
		return $videoCode;
	}

	public function load_jquery(&$params){
		if($params->get('load_jquery')){
			JLoader::import( 'joomla.version' );
			$version = new JVersion();
			if (version_compare( $version->RELEASE, '2.5', '<=')) {
					$doc = &JFactory::getDocument();
					$app = &JFactory::getApplication();
					$file=JURI::root(true).'/modules/mod_reslider/assets/js/jquery-1.7.2.min.js';
					$file2=JURI::root(true).'/modules/mod_reslider/assets/js/noconflict.js';
					$doc->addScript($file);
					$doc->addScript($file2);
			} else {
				JHtml::_('jquery.framework');
			}	
		}			
	}
}