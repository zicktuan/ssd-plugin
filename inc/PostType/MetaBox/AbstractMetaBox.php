<?php

namespace Awesome\PostType\MetaBox;

/**
 * @author lookawesome team
 * @version 1.0
 * @package metabox
 * 
 * Register metabox for theme hongdang
 */
abstract class AbstractMetaBox {	

	/**
	 * Name action field for metabox.
	 * @var string
	 */
	protected $actionField = '';

	public function __construct( $objectPosttype ){
		add_action( 'save_post', array($this, 'save') );
		$this->objPostType = $objectPosttype;
	}

	abstract function register();

	abstract function output( $post );

	abstract function save( $post_id );

	/**
	 * Created name action metabox.
	 * Name by post type name.
	 */
	protected function nonceField(){
		wp_nonce_field( 'save_' . $this->actionField, $this->actionField );
	}

	/**
	 * Handle verify form before save data metabox.
	 * @return true | false
	 */
	protected function vefifyForm(){
		if( !isset( $_POST[$this->actionField] ) ) {
			return false;
		}

		if( !wp_verify_nonce( $_POST[$this->actionField], 'save_' . $this->actionField ) ) {
			return false;
		}

		return true;
	}
}