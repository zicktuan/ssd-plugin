<?php
namespace Awesome\Widgets;

/**
* @package Widgets
* @version 1.0
* @author lookawesome team
*
* Class init widget for theme
*/
class InitWidget 
{
	function __construct() {
		add_action( 'widgets_init', array($this, 'includeTemplate') );
		add_action( 'admin_enqueue_scripts', array( $this, 'loadScripts' ) , 1000000000);
		add_action( 'admin_enqueue_scripts', array( $this, 'loadStyles' ) , 1000000000);
	}

	/**
	 * Handle register template.
	 * @return void
	 */
	public function includeTemplate() {
		register_widget( 'Awesome\Widgets\WidgetCategory' );
	}

	// import file javascript
	public function loadScripts(){
	}

	// import file css
	public function loadStyles(){
	}
}