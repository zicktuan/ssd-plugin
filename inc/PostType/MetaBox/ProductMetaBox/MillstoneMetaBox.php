<?php
namespace Awesome\PostType\MetaBox\ProductMetaBox;

use Awesome\PostType\MetaBox\AbstractMetaBox;

class MillstoneMetaBox extends AbstractMetaBox
{
	protected $actionField = 'action_nam_metabox';

	public function register(){
		add_meta_box( 
			'product-millstone', 
			'Cối trộn', 
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

		$product_millstone = get_post_meta( $post->ID, '_product_millstone', true );

		?>
			<label for="product_millstone"><?php _e("Cối trộn", 'MXD') ?>: </label>
			<input type="text" id="product_millstone" name="product_millstone" value="<?php echo esc_attr( $product_millstone ) ?>" />
		<?php
	}

	public function save($post_id){
		/**
		 * Form validate action
		 */
		if( !$this->vefifyForm() ) {
			return false;
		}

		update_post_meta( $post_id, '_product_millstone', sanitize_text_field($_POST['product_millstone']) );
	}
}