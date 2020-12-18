<?php
namespace Awesome\PostType\MetaBox\ProductMetaBox;

use Awesome\PostType\MetaBox\AbstractMetaBox;

class OriginMetaBox extends AbstractMetaBox
{
	protected $actionField = 'action_nam_metabox';

	public function register(){
		add_meta_box( 
			'product-origin', 
			'Xuất xứ', 
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

		$product_origin = get_post_meta( $post->ID, '_product_origin', true );

		?>
			<label for="product_origin"><?php _e("Xuất xứ", 'MXD') ?>: </label>
			<input type="text" id="product_origin" name="product_origin" value="<?php echo esc_attr( $product_origin ) ?>" />
		<?php
	}

	public function save($post_id){
		/**
		 * Form validate action
		 */
		if( !$this->vefifyForm() ) {
			return false;
		}

		update_post_meta( $post_id, '_product_origin', sanitize_text_field($_POST['product_origin']) );
	}
}