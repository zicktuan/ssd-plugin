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

class Header extends SettingFactory
{

	public function section(){
		return array(
	        'id'          => 'header',
	        'title'       => 'Header Settings'
	    );
	}

	public function settings(){
		return [
				[
					'id'          => 'mxd_header_logo',
			        'label'       => 'Header logo',
			        'std'         => '',
			        'type'        => 'upload',
			        'section'     => 'header',
			        'class'       => '',
				],
				[
					'id'          => 'mxd_header_phone',
			        'label'       => 'Header phone',
			        'std'         => '',
			        'type'        => 'text',
			        'section'     => 'header',
			        'class'       => '',
				]
			];
	}
}