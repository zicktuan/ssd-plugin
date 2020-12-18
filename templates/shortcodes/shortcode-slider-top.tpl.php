<section class="awe-section pt-0 pb-0">
    <div class="el-owlcarousel" data-item="1" data-gap="0" data-transition-style="goDown" data-auto-play="20000" data-navigation="true" data-pagination="false" data-timer="true">
        <?php foreach ($listItems as $value): ?>
        <div class="owl-carousel-item">
        	<a href="<?php echo isset( $value['items_link'] ) ? esc_html__( $value['items_link'], 'MXD' ) : '' ?>">
            <?php echo ( isset( $value['items_bg'] ) ) ? '<img src="'. wp_get_attachment_url( $value['items_bg'] ) .'" alt="">' : '' ?>
        </a>
        </div>
        <?php endforeach; ?>
    </div>
</section>