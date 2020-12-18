<?php
namespace Awesome\PostType\MetaBox\ProductMetaBox;

use Awesome\PostType\MetaBox\AbstractMetaBox;

class GuaranteeMetaBox extends AbstractMetaBox
{
	protected $actionField = 'action_nam_metabox';

	public function register(){
		add_meta_box( 
			'product-guarantee', 
			'Chính sách bảo hành', 
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

		$product_guarantee = get_post_meta( $post->ID, '_product_guarantee', true );
		?>
			<label for="product_meta_content"><?php _e( 'Chính sách bảo hành', 'MXD' ); ?></label>
		<?php
        wp_editor($product_guarantee, 'meta_content_editor', array(
				'wpautop'       =>  true,
				'media_buttons' =>  false,
				'textarea_name' =>  'product_guarantee',
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

		update_post_meta( $post_id, '_product_guarantee', $_POST['product_guarantee'] );
	}
}