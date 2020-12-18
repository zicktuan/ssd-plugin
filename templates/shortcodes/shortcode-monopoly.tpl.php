<section class="awe-section bg-color-gray pt-40 pb-40 mxd_monopoly">
    <div class="container">

        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-md-12">
                <div class="awe-section--title">
                    <h2 class="title text-uppercase mxd_monopoly_heading">
                        <?php echo isset( $atts['title_text'] ) ? esc_html__( $atts['title_text'], 'MXD' ) : '' ?>
                    </h2>
                    <hr class="mxd-divider-50-2 mt-10 mb-30">
                </div>
            </div>
        </div>
        <!-- END / SECTION TITLE -->
        <div class="row">
                <?php foreach ($listItems as $value): ?>
                <!-- ITEM -->
                <div class="col-md-3">
                    <div class="el-image image-style-4 mxd_monopoly_image">
                        <a href="<?php echo isset( $value['items_link'] ) ? esc_html__( $value['items_link'], 'MXD' ) : '' ?>">
                            <?php if ( !empty( $value['items_image'] )): ?>
                                <img src="<?php echo wp_get_attachment_url( $value['items_image'], 'mayxaydung-thumbnail-260x300' ); ?>">
                            <?php endif ?>
                        </a>
                    </div>
                </div>
                <!-- END / ITEM -->
                <?php endforeach ?>
        </div>

    </div>
</section>