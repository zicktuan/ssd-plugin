<?php 

namespace Awesome\ThemeSettings;

/**
 * @author lookawesome team
 * @version 1.0
 * @package ThemeSettings
 * 
 * Abstract factory theme setting
*/
abstract class SettingFactory 
{	
	public $section = null;

	public function __construct(){
		$this->section = $this->section();	
		$this->settings = $this->settings();	
	}
	
	abstract public function section();

	abstract public function settings();
}