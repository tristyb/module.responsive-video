<?php

#@license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

defined('_JEXEC') or die;

class mod_responsiveVideoHelper{
	public static function getVideo($params){
		$videoCode = $params->get('embed_code');
		return $videoCode;
	}
}
