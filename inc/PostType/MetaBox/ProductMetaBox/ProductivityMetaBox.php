<?php
namespace Awesome\PostType\MetaBox\ProductMetaBox;

use Awesome\PostType\MetaBox\AbstractMetaBox;

class ProductivityMetaBox extends AbstractMetaBox
{
	protected $actionField = 'action_nam_metabox';

	public function register(){
		add_meta_box( 
			'product-productivity', 
			'Năng suất', 
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

		$product_productivity = get_post_meta( $post->ID, '_product_productivity', true );

		?>
			<label for="product_productivity"><?php _e("Năng suất", 'MXD') ?>: </label>
			<input type="text" id="product_productivity" name="product_productivity" value="<?php echo esc_attr( $product_productivity ) ?>" />
		<?php
	}

	public function save($post_id){
		/**
		 * Form validate action
		 */
		if( !$this->vefifyForm() ) {
			return false;
		}

		update_post_meta( $post_id, '_product_productivity', sanitize_text_field($_POST['product_productivity']) );
	}
}