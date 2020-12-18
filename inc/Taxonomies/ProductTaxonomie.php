<?php
namespace Awesome\Taxonomies;

class ProductTaxonomie extends AbstractTaxonomies {

	protected $taxonomie = 'product';

	protected $argsPostType = ['mxd_product'];

	public function __construct(){
		parent::__construct();
	}

	public function labels(){
		return array(
			'name'              => _x( 'Category Product', 'taxonomy general name', 'MXD' ),
			'singular_name'     => _x( 'Category Product', 'taxonomy singular name', 'MXD' ),
			'search_items'      => __( 'Search Categories', 'MXD' ),
			'all_items'         => __( 'All Categories', 'MXD' ),
			'parent_item'       => __( 'Parent Category', 'MXD' ),
			'parent_item_colon' => __( 'Parent Category:', 'MXD' ),
			'edit_item'         => __( 'Edit Category', 'MXD' ),
			'update_item'       => __( 'Update Category', 'MXD' ),
			'add_new_item'      => __( 'Add New Category', 'MXD' ),
			'new_item_name'     => __( 'New Category Name', 'MXD' ),
			'menu_name'         => __( 'Category', 'MXD' ),
		);
	}

	public function argsRegister(){
		return array(
			'hierarchical'      => true,
			'labels'            => $this->labels(),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'product' ),
		);
	}

	public function taxonomieName(){
		return $this->taxonomie;
	}
}
