<div class="widget mb-10">
    <h4 class="widget-title widget-title-style-1 mxd_support_title"><?php echo isset( $instance['title'] ) ? esc_html__( $instance['title'], 'MXD' ) : '' ?></h4>
    <ul>
    	<?php foreach ($listItems as $value): ?>
        <li><a href="<?php echo $value->url; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo isset($value->title) ? ( $value->title ) : '' ; ?></a></li>
        <?php endforeach ?>
    </ul>
</div>