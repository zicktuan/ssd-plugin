<section class="awe-section pt-40 pb-30 mxd_post">
    <div class="container">
        <div class="row">
            <?php foreach ($listItems as $value) : 
                    $listPost = get_posts([
                    "order"       => isset($value['order_by']) ? $value['order_by'] : "DESC",
                    "numberposts" => isset($value['number_post']) ? $value['number_post'] : 3,
                    "category"    => isset($value['cat_1_category']) ? $value['cat_1_category'] : 0
                ]);
                    $cat = get_category($value['cat_1_category']);
            ?>
            <div class="col-md-6">
                <div class="row">
                <!-- SECTION TITLE -->
                    <div class="col-md-12">
                        <div class="el-text">
                            <h2 class="title fs-18 text-uppercase mxd_post_heading">
                                <?php echo $cat->name; ?>
                            </h2>
                            <hr class="awe-divider mxd-divider-50-2 mt-10 mb-20">
                        </div>
                    </div>
                    <?php foreach ($listPost as $value): ?>
                    <div class="col-md-12">
                        <div class="el-image-box el-image-box-left">
                            <div class="el-image mb-15 mxd_post_thumbnail">
                                <a href="<?php esc_url( the_permalink($value->ID) ); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url( $value->ID, 'mayxaydung-thumbnail-360x240' ); ?>" alt="">
                                </a>
                            </div>
                            <div class="el-text mxd_post_text">
                                <h4 class="title mxd_post_title mb-0"><a href="<?php esc_url( the_permalink($value->ID) ); ?>"><?php esc_attr_e( $value->post_title, "MXD" ); ?></a></h4>
                                <p><?php esc_html_e( wp_trim_words($value->post_excerpt, 29, " ..."), "MXD"); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                    
                </div>
                <!-- END / SECTION TITLE -->
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>