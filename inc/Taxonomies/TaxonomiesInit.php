<?php

namespace Awesome\Taxonomies;

use Awesome\Taxonomies\ProductTaxonomie;

/**
 * @author lookawesome team
 * @version 1.0
 * @package taxonomie
 * 
 * Register taxonomie for theme hongdang
 */
class TaxonomiesInit {

	public function __construct(){
		new ProductTaxonomie;
	}
}