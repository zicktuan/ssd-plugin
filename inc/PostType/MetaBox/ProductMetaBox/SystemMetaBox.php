<?php
namespace Awesome\PostType\MetaBox\ProductMetaBox;

use Awesome\PostType\MetaBox\AbstractMetaBox;

class SystemMetaBox extends AbstractMetaBox
{
	protected $actionField = 'action_nam_metabox';

	public function register(){
		add_meta_box( 
			'product-system', 
			'Hệ thống điều khiển', 
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

		$product_system = get_post_meta( $post->ID, '_product_system', true );

		?>
			<label for="product_system"><?php _e("Hệ thống điều khiển", 'MXD') ?>: </label>
			<input type="text" id="product_system" name="product_system" value="<?php echo esc_attr( $product_system ) ?>" />
		<?php
	}

	public function save($post_id){
		/**
		 * Form validate action
		 */
		if( !$this->vefifyForm() ) {
			return false;
		}

		update_post_meta( $post_id, '_product_system', sanitize_text_field($_POST['product_system']) );
	}
}