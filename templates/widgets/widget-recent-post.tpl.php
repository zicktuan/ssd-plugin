<div class="widget">
	<h4 class="widget-title widget-title-style-2 widget-title mb-20">
		<?php echo isset( $instance['title'] ) ? esc_html__( $instance['title'], 'MXD' ) : '' ?>
	</h4>
	<div class="widget-list">
	    <!-- ITEM -->
	    <?php foreach ($listPost as $value) :?>
	        <div class="item">
		        <div class="post-media">
		            <div class="image-wrap image-cover image-cover-75">
		                <a href="<?php echo $value->guid; ?>"><img src="<?php echo get_the_post_thumbnail_url( $value->ID, 'mayxaydung-thumbnail-260x300' ); ?>"></a>
		            </div>
		        </div>
		        <div class="post-body overflow-hidden">
		            <div class="post-title">
		                <h2 class="title fs-14">
		                    <a href="<?php echo $value->guid; ?>" title="<?php echo $value->post_title; ?>"><?php _e( $value->post_title, 'MXD' ); ?></a>
		                </h2>
		            </div>
		            <div class="post-meta">
		                <span><?php echo get_the_date( 'M, j, Y ' ); ?></span>
		            </div>
		        </div>
		    </div>
	    <?php endforeach; ?>
	    <!-- END / ITEM -->

	</div>
</div>