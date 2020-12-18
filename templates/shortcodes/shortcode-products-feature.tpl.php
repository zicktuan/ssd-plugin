<section class="awe-section pt-50 pb-50 bg-parallax bg-color-violet mxd_featured" data-background-image="<?php echo ( isset( $atts['item_bg'] ) ) ? wp_get_attachment_url( $atts['item_bg'] ) : '' ?>">
    <div class="container">

        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-md-12">
                <div class="awe-section--title mb-30">
                    <h2 class="title text-uppercase mxd_featured_heading"><?php echo isset( $atts['text_title'] ) ? esc_html__( $atts['text_title'], 'MXD' ) : '' ?></h2>
                    <hr class="mxd-divider-50-2 mt-10 mb-20">
                </div>
            </div>
        </div>
        <!-- END / SECTION TITLE -->
        
        <div class="row mxd_featured_item">

            <div class="el-post-wrapper" data-style="list" data-col="2">
                <?php foreach ($listItems as $value): ?>
                    <?php global $product ?>
                <div class="post-only post-item">
                    <!-- POST -->
                    <div class="post">
                        <div class="post-media">
                            <div class="el-image">
                                <?php echo ( isset( $value['items_image'] ) ) ? '<img src="'. wp_get_attachment_url( ($value['items_image'])) .'" alt="">' : '' ?>
                            </div>
                        </div>
                        <div class="post-body pt-0 pb-0">
                            <div class="post-title">
                                <h2 class="mxd_featured_title mt-0 mb-0">
                                    <a href="<?php echo isset( $value['items_link'] ) ? esc_html__( $value['items_link'], 'MXD' ) : '#' ?>">
                                        <?php echo isset( $value['items_title'] ) ? esc_html__( $value['items_title'], 'MXD' ) : '' ?>
                                    </a>
                                </h2>
                            </div>
                            <div class="post-entry mt-0">
                                <p><?php echo wp_trim_words($value['items_des'], 25, '...'); ?></p>
                            </div>
                            <div class="post-more mt-0">
                                <a class="awe-btn mxd_featured_btn fs-13" href="<?php echo isset( $value['items_link'] ) ? esc_html__( $value['items_link'], 'MXD' ) : '' ?>">
                                    <?php echo isset( $value['items_btn_detail'] ) ? esc_html__( $value['items_btn_detail'], 'MXD' ) : '' ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END / POST -->
                </div>
                <?php endforeach; ?>
            </div>
    

        </div>
    </div>
</section>