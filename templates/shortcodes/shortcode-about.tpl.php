<section class="awe-section pt-50 pb-50 bg-parallax mxd_about"  data-background-image="<?php echo ( isset( $atts['bg_item'] ) ) ? wp_get_attachment_url( $atts['bg_item'] ) : '' ?>">
    <div class="container">

        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-md-12">
                <div class="awe-section--title mb-20 ml-50 mr-50 mxd_about_header">
                    <h2 class="title text-uppercase mxd_about_heading"><?php echo isset( $atts['title_text'] ) ? esc_html__( $atts['title_text'], 'MXD' ) : '' ?></h2>
                    <hr class="mxd-divider-50-2 mt-10 mb-40">
                    <p><?php echo isset( $atts['item_des'] ) ? esc_html__( $atts['item_des'], 'MXD' ) : '' ?></p>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 text-center">
                <a href="<?php echo $atts['item_link_detail'] ?>" class="awe-btn mxd_about_btn awe-btn-large awe-btn-round">
                    <?php echo isset( $atts['item_btn_detail'] ) ? esc_html__( $atts['item_btn_detail'], 'MXD' ) : '' ?>
                </a>
            </div>
        </div>
        <!-- END / SECTION TITLE -->

        <div class="row mxd_about_item">

            <!-- ITEM -->
            <?php foreach ($listItems as $value): ?>
            <div class="col-md-4">
                <div class="el-has-icon text-center">
                    <div class="el-icon">
                        <i class="fa fa-<?php echo $value['items_icon']; ?> "></i>
                    </div>
                    <h4 class="title fs-14 text-uppercase mxd_about_title"><?php echo isset( $value['items_title'] ) ? esc_html__( $value['items_title'], 'MXD' ) : '' ?></h4>
                    <hr class="mxd-divider-50-2 mt-0 mb-15">
                    <p class="fs-16"><?php echo isset( $value['items_excerpt'] ) ? esc_html__( $value['items_excerpt'], 'MXD' ) : '' ?></p>
                </div>
            </div>
            <?php endforeach ?>
            <!-- END / ITEM -->
        </div>
    </div>
</section>

