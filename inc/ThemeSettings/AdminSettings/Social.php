<?php 

namespace Awesome\ThemeSettings\AdminSettings;

use Awesome\ThemeSettings\SettingFactory;

/**
 * @author lookawesome team
 * @version 1.0
 * @package AdminSettings
 * 
 * Setting General theme setting for theme bookawesome
*/

class Social extends SettingFactory
{

	public function section(){
		return array(
	        'id'          => 'social',
	        'title'       => 'Social Settings'
	    );
	}

	public function settings(){
		return [
				[
					'id'          => 'mxd_social_facebook',
			        'label'       => 'FACEBOOK URL',
			        'desc'        => 'URL to your Facebook account',
			        'std'         => '',
			        'type'        => 'text',
			        'section'     => 'social',
			        'class'       => ''
				],
				[
					'id'          => 'mxd_social_google',
			        'label'       => 'GOOGLE URL',
			        'desc'        => 'URL to your Google account',
			        'std'         => '',
			        'type'        => 'text',
			        'section'     => 'social',
			        'class'       => ''
				],
				[
					'id'          => 'mxd_social_twitter',
			        'label'       => 'TWITTER URL',
			        'desc'        => 'URL to your Twitter account',
			        'std'         => '',
			        'type'        => 'text',
			        'section'     => 'social',
			        'class'       => ''
				]
			];
	}
}