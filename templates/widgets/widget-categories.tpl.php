<div class="widget widget_categories mb-20">
	<h4 class="widget-title widget-title-style-2 widget-title mb-20">
		<?php echo isset( $instance['title'] ) ? esc_html__( $instance['title'], 'MXD' ) : '' ?>
	</h4>
	<ul>
		<?php foreach ($listItems as $value): ?>
	    	<li><a href="<?php echo $value->url; ?>" title=""><?php echo isset($value->title) ? ( $value->title ) : '' ; ?></a></li>
	    <?php endforeach ?>
	</ul>
</div>

