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

class Footer extends SettingFactory
{

	public function section(){
		return array(
	        'id'          => 'footer',
	        'title'       => 'Footer Settings'
	    );
	}

	public function settings(){
		return [
				[
					'id'          => 'mxd_footer_slider',
			        'label'       => 'Footer slider',
			        'std'         => '',
			        'type'        => 'text',
			        'section'     => 'footer',
			        'class'       => '',
				],
				[
					'id'          => 'mxd_footer_bg',
			        'label'       => 'Footer Background',
			        'std'         => '',
			        'type'        => 'upload',
			        'section'     => 'footer',
			        'class'       => '',
				],
				[
					'label'       => 'Footer Contact',
					'id'          => 'mxd_footer_contacts',
					'type'        => 'list-item',
					'section'     => 'footer',
					'settings'    => [
						[
							'id'          => 'mxd_footer_address',
					        'label'       => 'Footer address',
					        'type'        => 'text',
						],
						[
							'id'          => 'mxd_footer_phone',
					        'label'       => 'Footer phone',
					        'type'        => 'text',
						],
						[
							'id'          => 'mxd_footer_fax',
					        'label'       => 'Footer fax',
					        'type'        => 'text',
						],
						[
							'id'          => 'mxd_footer_email',
					        'label'       => 'Footer Email',
					        'type'        => 'text',
						],
					]         
				],
				[
					'label'       => 'Footer Support',
					'id'          => 'mxd_footer_support',
					'type'        => 'list-item',
					'section'     => 'footer',
					'settings'    => [
						[
							'id'          => 'mxd_footer_tel',
					        'label'       => 'Footer tel',
					        'type'        => 'text',
						],
						[
							'id'          => 'mxd_footer_desc',
					        'label'       => 'Footer email',
					        'type'        => 'text',
						],
					]         
				],
				[
					'id'          => 'mxd_footer_copyright',
			        'label'       => 'Footer copyright',
			        'desc'        => 'Footer copyright',
			        'std'         => '',
			        'type'        => 'text',
			        'section'     => 'footer',
			        'class'       => '',
				],
			];
	}
}