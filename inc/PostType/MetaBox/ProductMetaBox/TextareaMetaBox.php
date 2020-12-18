<?php
namespace Awesome\PostType\MetaBox\ProductMetaBox;

use Awesome\PostType\MetaBox\AbstractMetaBox;

class TextareaMetaBox extends AbstractMetaBox
{
	protected $actionField = 'action_nam_metabox';

	public function register(){
		add_meta_box( 
			'textarea-product-metabox', 
			'Textarea', 
			array($this, 'output'), 
			$this->objPostType->postTypeName() 
		);
	}

	public function output( $post ){
		/**
		 * Created name action metabox.
		 * Name by post type name.
		 */
		$this->nonceField();

			$meta_content = get_post_meta( $post->ID, '_product_meta_content', true );
		?>
			<label for="product_meta_content"><?php _e( 'My Textarea', 'MXD' ); ?></label>
		<?php
	        wp_editor($meta_content, 'parameter_content_editor', array(
					'wpautop'       =>  true,
					'media_buttons' =>  false,
					'textarea_name' =>  'meta_content_textarea',
					'textarea_rows' =>  10,
					'teeny'         =>  true
	        ));
	}

	public function save($post_id){
		/**
		 * Form validate action
		 */
		if( !$this->vefifyForm() ) {
			return false;
		}

		update_post_meta( $post_id, '_product_meta_content', $_POST['meta_content_textarea'] );
	}
}