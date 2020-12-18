<?php
namespace Awesome\PostType\MetaBox\ProductMetaBox;

use Awesome\PostType\MetaBox\AbstractMetaBox;

class AddInfoProductMetaBox extends AbstractMetaBox
{
	protected $actionField = 'action_nam_metabox';

	public function register(){
		add_meta_box( 
			'add-info-product', 
			'Thông tin sản phẩm', 
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
		$product_info1 = get_post_meta( $post->ID, '_add_info_product1', true );
		?>
			<div class="input_fields_wrap">
			    <button class="add_field_button">Add new</button><br><br>
			    <div>
			    	<?php if (!empty($product_info1)) { ?>
				    	<?php foreach ($product_info1 as $key => $value) { ?>
				    		<input type="text" name="product_info1[]" value="<?php echo $key ?>"> 
				    		<input type="text" name="product_info2[]" value="<?php echo $value ?>"><br/>
				    	<?php } ?>
			    	<?php }else { ?>
			    			<input type="text" name="product_info1[]" value=""> 
				    		<input type="text" name="product_info2[]" value=""><br/>
			    	<?php } ?>
			    </div>
			</div>
		<?php
	}

	public function save($post_id){
		/**
		 * Form validate action
		 */
		if( !$this->vefifyForm() ) {
			return false;
		}
		$key   = $_POST['product_info1'];
		$value = $_POST['product_info2'];	
		$data  = array_combine($key, $value);

		update_post_meta( $post_id, '_add_info_product1', $data );
		
	}
}