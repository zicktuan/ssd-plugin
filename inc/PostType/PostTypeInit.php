<?php
namespace Awesome\PostType;

use Awesome\PostType\ProductPostType;

/**
 * @author lookawesome team
 * @version 1.0
 * @package PostType
 * 
 * Register post type for theme mayxaydung
 */
class PostTypeInit {

	public function __construct(){
		new ProductPostType;
	}
}