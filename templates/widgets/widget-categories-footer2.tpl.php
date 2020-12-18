<div class="widget mb-10">
    <h4 class="widget-title widget-title-style-1 mxd_contact_title"><?php echo isset( $instance['title'] ) ? esc_html__( $instance['title'], 'MXD' ) : '' ?></h4>
    <ul>
        <?php foreach ($listItems as $value): ?>
            <li><a href="<?php echo $value->url; ?>" title=""><?php echo isset($value->title) ? ( $value->title ) : '' ; ?></a></li>
        <?php endforeach ?>
    </ul>
</div>