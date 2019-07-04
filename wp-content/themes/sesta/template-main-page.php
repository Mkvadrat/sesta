<?php
/*
Template name: Main page
*/

get_header(); 
?>
    
    <div class="content">
        <?php $block_a = get_field('content_block_a_main_page'); ?>
        <div class="block__3">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="title__block"><p><?php echo $block_a['title_content_subblock_a_main_page']; ?></p></div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="grid__2">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="item">
                                        <?php echo $block_a['wp_textarea_content_subblock_a_main_page']; ?>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="item">
                                        <?php echo $block_a['wp_textarea_content_subblock_b_main_page']; ?>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="item">
                                        <?php echo $block_a['wp_textarea_content_subblock_c_main_page']; ?>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="item">
                                       <?php echo $block_a['wp_textarea_content_subblock_d_main_page']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php $block_b = get_field('content_block_b_main_page'); ?>
        <div class="block__4 bg__rabitsa">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="title__block">
                            <?php echo $block_b['textarea_content_subblock_a_main_page']; ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="grid__3">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                    <div class="item">
                                        <?php echo $block_b['wp_textarea_content_subblock_b_main_page']; ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                    <div class="item">
                                        <?php echo $block_b['wp_textarea_content_subblock_c_main_page']; ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                    <div class="item">
                                        <?php echo $block_b['wp_textarea_content_subblock_d_main_page']; ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                    <div class="item">
                                        <?php echo $block_b['wp_textarea_content_subblock_e_main_page']; ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                    <div class="item">
                                        <?php echo $block_b['wp_textarea_content_subblock_f_main_page']; ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                    <div class="item">
                                        <?php echo $block_b['wp_textarea_content_subblock_g_main_page']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php $block_c = get_field('content_block_c_main_page'); ?>
        <div class="block__2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="title__block"><p><?php echo $block_c['title_content_subblock_a_main_page']; ?></p></div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="grid__1">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="map__box">
                                        <?php echo $block_c['wp_textarea_content_subblock_a_main_page']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 visible-lg">
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div class="block__2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="title__block"><p><?php echo get_field('title_content_block_a_main_page'); ?></p></div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="grid__1">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="button__block">
                                        <?php
                                            $all_categories = get_categories('hide_empty=0&exclude=1');
                                            $category_link_array = array();
                                            foreach( $all_categories as $single_cat ){
                                                echo '<a href="' . get_category_link($single_cat->term_id) . '">' . $single_cat->name . '</a>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php $services = getRelatedMeta(get_the_ID(), 'related_product_block_main_page'); ?>
                    <?php if($services){ ?>
                    <div class="col-xs-12 col-md-p-0">
                        <div class="products__carousel owl-carousel">
                            <?php foreach($services as $service){ ?>
                            <div class="item">
                                <a href="<?php echo get_permalink($service->ID); ?>" class="products__inner">
                                    <?php
                                        $image_url = get_field('image_single_page', $service->ID);
                                    ?>
                                    <div class="products__img" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg' ?>')"></div>
                                    <div class="products__title"><?php echo $service->post_title; ?></div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="block__video">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-xs-p-0">
                        <div class="bg__video">
                            <?php echo get_field('wp_textarea_content_block_a_main_page'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php $image_url = wp_get_attachment_url(get_field('image_content_block_a_main_page')); ?>
        <div class="block__form" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/bg-form.jpg'; ?>')">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-lg-5">
                        <div class="form">
                            <?php
                                $forms_a = get_field('callback_content_block_a_main_page');
                                if($forms_a){
                                    echo do_shortcode('[contact-form-7 id=" ' . $forms_a . ' "]'); 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
<?php get_footer(); ?>