<?php
namespace Awesome\PostType;

use Awesome\PostType\MetaBox\ProductMetaBox\CodeMetaBox;
use Awesome\PostType\MetaBox\ProductMetaBox\ProductivityMetaBox;
use Awesome\PostType\MetaBox\ProductMetaBox\MillstoneMetaBox;
use Awesome\PostType\MetaBox\ProductMetaBox\SystemMetaBox;
use Awesome\PostType\MetaBox\ProductMetaBox\OriginMetaBox;
use Awesome\PostType\MetaBox\ProductMetaBox\FeaturesMetaBox;
use Awesome\PostType\MetaBox\ProductMetaBox\GuaranteeMetaBox;
use Awesome\PostType\MetaBox\ProductMetaBox\TextareaMetaBox;
use Awesome\PostType\MetaBox\ProductMetaBox\AddInfoProductMetaBox;

class ProductPostType extends AbstractPostType {

	protected $posType = 'mxd_product';

	public function __construct(){
		parent::__construct();
		add_action( 'admin_enqueue_scripts', array( $this, 'loadScripts' ) , 1000000000);
		add_action( 'admin_enqueue_scripts', array( $this, 'loadStyles' ) , 1000000000);
	}

	/**
	 * Handle add metabox for post type.
	 * @return void
	 */
	public function metaBox(){
		add_action( 'add_meta_boxes', array(new CodeMetaBox($this), 'register') );
		add_action( 'add_meta_boxes', array(new ProductivityMetaBox($this), 'register') );
		add_action( 'add_meta_boxes', array(new MillstoneMetaBox($this), 'register') );
		add_action( 'add_meta_boxes', array(new SystemMetaBox($this), 'register') );
		add_action( 'add_meta_boxes', array(new OriginMetaBox($this), 'register') );
		add_action( 'add_meta_boxes', array(new FeaturesMetaBox($this), 'register') );
		add_action( 'add_meta_boxes', array(new GuaranteeMetaBox($this), 'register') );
		add_action( 'add_meta_boxes', array(new TextareaMetaBox($this), 'register') );
		add_action( 'add_meta_boxes', array(new AddInfoProductMetaBox($this), 'register') );
	}

	public function labels(){
		return array(
			'name'                  => _x( 'Product', 'Product General Name', 'MXD' ),
			'singular_name'         => _x( 'Product', 'Product Singular Name', 'MXD' ),
			'menu_name'             => __( 'Products', 'MXD' ),
			'name_admin_bar'        => __( 'Products', 'MXD' ),
			'archives'              => __( 'Item Archives', 'MXD' ),
			'attributes'            => __( 'Item Attributes', 'MXD' ),
			'parent_item_colon'     => __( 'Parent Item:', 'MXD' ),
			'all_items'             => __( 'All Items', 'MXD' ),
			'add_new_item'          => __( 'Add New Item', 'MXD' ),
			'add_new'               => __( 'Add New', 'MXD' ),
			'new_item'              => __( 'New Item', 'MXD' ),
			'edit_item'             => __( 'Edit Item', 'MXD' ),
			'update_item'           => __( 'Update Item', 'MXD' ),
			'view_item'             => __( 'View Item', 'MXD' ),
			'view_items'            => __( 'View Items', 'MXD' ),
			'search_items'          => __( 'Search Item', 'MXD' ),
			'not_found'             => __( 'Not found', 'MXD' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'MXD' ),
			'featured_image'        => __( 'Featured Image', 'MXD' ),
			'set_featured_image'    => __( 'Set featured image', 'MXD' ),
			'remove_featured_image' => __( 'Remove featured image', 'MXD' ),
			'use_featured_image'    => __( 'Use as featured image', 'MXD' ),
			'insert_into_item'      => __( 'Insert into item', 'MXD' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'MXD' ),
			'items_list'            => __( 'Items list', 'MXD' ),
			'items_list_navigation' => __( 'Items list navigation', 'MXD' ),
			'filter_items_list'     => __( 'Filter items list', 'MXD' )
		);
	}

	public function argsRegister(){
		return array(
			'label'                 => __( 'Product', 'MXD' ),
			'description'           => __( 'Product Description', 'MXD' ),
			'labels'                => $this->labels(),
			'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'taxonomies'            => array( 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'menu_icon'             => 'dashicons-cart'
		);
	}

	public function postTypeName(){
		return $this->posType;
	}

	// import file javascript
	public function loadScripts(){
		wp_enqueue_script('hd-posts-type-product-js', MXD_BASE_URL_PLUGIN.'/assets/backend/js/posts-type-product.js', array('jquery'), MXD_BASE_URL_PLUGIN, true);
	}

	// import file css
	public function loadStyles(){
		wp_enqueue_style('hd-posts-type-product',MXD_BASE_URL_PLUGIN.'/assets/backend/css/posts-type-product.css', MXD_BASE_URL_PLUGIN, true);
	}
}
