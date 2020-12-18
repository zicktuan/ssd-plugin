<?php
namespace Awesome\PostType\MetaBox\ProductMetaBox;

use Awesome\PostType\MetaBox\AbstractMetaBox;

class CodeMetaBox extends AbstractMetaBox
{
	protected $actionField = 'action_nam_metabox';

	public function register(){
		add_meta_box( 
			'product-code', 
			'Mã SP', 
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

		$product_code = get_post_meta( $post->ID, '_product_code', true );

		?>
			<label for="product_code"><?php _e("Mã sản phẩm", 'MXD') ?>: </label>
			<input type="text" id="product_code" name="product_code" value="<?php echo esc_attr( $product_code ) ?>" />
		<?php
	}

	public function save($post_id){
		/**
		 * Form validate action
		 */
		if( !$this->vefifyForm() ) {
			return false;
		}

		update_post_meta( $post_id, '_product_code', sanitize_text_field($_POST['product_code']) );
	}
}