<section class="awe-section pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div class="el-owlcarousel" data-item="5" data-gap="30" data-transition-style="false" data-auto-play="false" data-navigation="true" data-pagination="false">
            <?php if (!empty($listItems)): ?>
                <?php foreach ($listItems as $value): ?>
                    <div class="owl-carousel-item">
                        <?php echo wp_get_attachment_image( $value, 'mayxaydung-thumbnail-224x146' ); ?>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
            </div>
        </div>
    </div>
</section>
