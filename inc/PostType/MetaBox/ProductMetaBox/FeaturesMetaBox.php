<?php
namespace Awesome\PostType\MetaBox\ProductMetaBox;

use Awesome\PostType\MetaBox\AbstractMetaBox;

class FeaturesMetaBox extends AbstractMetaBox
{
	protected $actionField = 'action_nam_metabox';

	public function register(){
		add_meta_box( 
			'product-features', 
			'Đặc điểm nổi bật', 
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

		$product_features = get_post_meta( $post->ID, '_product_features', true );
		?>
			<label for="product_meta_content"><?php _e( 'Đặc điểm nổi bật', 'MXD' ); ?></label>
		<?php
        wp_editor($product_features, 'features_content_editor', array(
				'wpautop'       =>  true,
				'media_buttons' =>  false,
				'textarea_name' =>  'product_features',
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

		update_post_meta( $post_id, '_product_features', $_POST['product_features'] );
	}
}