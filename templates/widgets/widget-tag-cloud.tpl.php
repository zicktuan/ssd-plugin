
    <h4 class="widget-title widget-title-style-2 widget-title mb-20"><?php echo isset( $instance['title'] ) ? esc_html__( $instance['title'], 'MXD' ) : '' ?></h4>
    <div class="tagcloud">
        <?php foreach ($listCloud as $value): ?>
            <a href="<?php echo site_url(). '/tag/'. $value->slug; ?>" title="<?php echo $value->name; ?>"><?php _e( $value->name, 'MXD' ) ?></a>
        <?php endforeach ?>
    </div>