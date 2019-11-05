<?php
/*
Theme Name: Sesta
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/

get_header();
?>
    
    <div class="content">
        <div class="block__content product__content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-10 col-lg-offset-1">

                        <div class="bg__video" style="background-image: url('<?php echo get_field('images_videos_single_page') ? get_field('images_videos_single_page') : '/wp-content/themes/sesta/image/bg-video.jpg'; ?>')">
                            <a data-fancybox href="<?php echo get_field('link_videos_single_page'); ?>" class="iframe btn btn-video">
                            <img src="/wp-content/themes/sesta/image/play.svg" alt="play"/>Смотреть видео</a>
                        </div>

                        <div class="block__info">
                            <div class="row">
                                <div class="col-xs-12 col-lg-6">
                                    <div class="big__carousel">
                                        <div class="owl-carousel" data-slider-id="1">
                                            <?php
                                                global $nggdb;
                                                $gallery_id = getNextGallery(get_the_ID(), 'gallery_single_page');
                                                $gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                                                if($gallery_image){
                                                    foreach($gallery_image as $image) { 
                                                ?>
                                                    <a class="item" data-fancybox="gallery" href="<?php echo nextgen_esc_url($image->imageURL); ?>" style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>')"></a>
                                                <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <div class="owl-thumbs" data-slider-id="1">
                                            <?php
                                                global $nggdb;
                                                $gallery_id = getNextGallery(get_the_ID(), 'gallery_single_page');
                                                $gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                                                if($gallery_image){
                                                    foreach($gallery_image as $image) { 
                                                ?>
                                                    <button class="owl-thumb-item" style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>')"></button>
                                                <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="col-xs-12 col-lg-6">
                                    <?php if( have_rows('table_technical_characteristics_single_page')){ ?>
                                    <h3><?php echo get_field('main_technical_characteristics_single_page'); ?></h3>
                                    <div class="table__rounded">
                                        <table>
                                            <tbody>
                                            <?php
                                                while ( have_rows('table_technical_characteristics_single_page') ) { the_row();
                                            ?>
                                            <tr>
                                                <td><?php the_sub_field('name_characteristics_single_page'); ?></td>
                                                <td><?php the_sub_field('value_characteristics_single_page'); ?></td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if( have_rows('table_performance_single_page')){ ?>
                                    <h3><?php echo get_field('main_performance_single_page'); ?></h3>
                                    <div class="table__rounded">
                                        <table>
                                            <tbody>
                                            <?php
                                                while ( have_rows('table_performance_single_page') ) { the_row();
                                            ?> 
                                            <tr>
                                                <td><?php the_sub_field('name_performance_single_page'); ?></td>
                                                <td><?php the_sub_field('value_performance_single_page'); ?></td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                        <?php $block_a = get_field('content_block_a_single_page'); ?>
                        <div class="block__border">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="img-circle"><img src="<?php echo $block_a['image_content_subblock_a_main_page']; ?>" alt="warranty"/></div>
                                    <p><?php echo $block_a['text_content_subblock_a_main_page']; ?></p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="img-circle"><img src="<?php echo $block_a['image_content_subblock_b_main_page']; ?>" alt="checklist"/></div>
                                    <p><?php echo $block_a['text_content_subblock_b_main_page']; ?></p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="img-circle"><img src="<?php echo $block_a['image_content_subblock_c_main_page']; ?>" alt="presentation"/></div>
                                    <p><?php echo $block_a['text_content_subblock_c_main_page']; ?></p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="img-circle"><img src="<?php echo $block_a['image_content_subblock_d_main_page']; ?>" alt="consultant"/></div>
                                    <p><?php echo $block_a['text_content_subblock_d_main_page']; ?></p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="img-circle"><img src="<?php echo $block_a['image_content_subblock_e_main_page']; ?>" alt="package"/></div>
                                    <p><?php echo $block_a['text_content_subblock_e_main_page']; ?></p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="img-circle"><img src="<?php echo $block_a['image_content_subblock_f_main_page']; ?>" alt="package"/></div>
                                    <p><?php echo $block_a['text_content_subblock_f_main_page']; ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <hr class="hr__full"/>

        <div class="block__content product__content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-10 col-lg-offset-1">

                        <?php echo get_field('wp_textarea_content_block_a_single_page'); ?>

                        <div class="block__info ">
                            <div class="row">
                                <?php if( have_rows('table_dimensions_single_page')){ ?>
                                <div class="col-xs-12 col-lg-6">
                                    
                                    <h3><?php echo get_field('main_dimensions_single_page'); ?></h3>
                                    
                                    <div class="table__rounded">
                                        <table>
                                            <tbody>
                                            <?php
                                                while ( have_rows('table_dimensions_single_page') ) { the_row();
                                            ?>
                                            <tr>
                                                <td><?php the_sub_field('name_dimensions_single_page'); ?></td>
                                                <td><?php the_sub_field('value_dimensions_single_page'); ?></td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
                                
                                <?php if( have_rows('table_dimensions_transport_position_single_page')){ ?>
                                <div class="col-xs-12 col-lg-6">
                                    
                                    <h3><?php echo get_field('main_dimensions_transport_position_single_page'); ?></h3>
                                    
                                    <div class="table__rounded">
                                        <table>
                                            <tbody>
                                            <?php
                                                while ( have_rows('table_dimensions_transport_position_single_page') ) { the_row();
                                            ?>
                                            <tr>
                                                <td><?php the_sub_field('name_dimensions_transport_position_single_page'); ?></td>
                                                <td><?php the_sub_field('value_dimensions_transport_position_single_page'); ?></td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        
                        <?php if(get_post_meta( get_the_ID(), 'enable_block_a_section_single_page', $single = true ) == 'yes'){ ?>
                        <?php $block_b = get_field('content_block_b_single_page'); ?>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-target="#collapseOne" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne">
                                            <img src="/wp-content/themes/sesta/image/plus.svg" alt="plus"/><?php echo $block_b['title_accordion_a_single_page']; ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <?php echo $block_b['wp_textarea_accordion_a_single_page']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <img src="/wp-content/themes/sesta/image/plus.svg" alt="plus"/><?php echo $block_b['title_accordion_b_single_page']; ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <?php echo $block_b['wp_textarea_accordion_b_single_page']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        

                        <div class="block__price">
                            <?php echo get_field('wp_textarea_content_block_b_single_page'); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <hr class="hr__full"/>
        
        
        <div class="block__recom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="title__block">
                            <p><?php echo get_field('text_product_single_page'); ?></p>
                        </div>
                    </div>
                    
                    <?php $services = getRelatedMeta(get_the_ID(), 'related_product_single_page'); ?>
                    <?php if($services){ ?>
                    <div class="col-xs-12 col-xs-p-0">
                        <div class="recomm__grid owl-carousel">
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

        <?php if( have_rows('table_additional_information_single_page')){ ?>
        <div class="block__4 bg__rabitsa">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="title__block">
                            <?php echo get_field('wp_textarea_content_block_c_single_page'); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="grid__3">
                            <div class="row">
                                <?php
                                    while ( have_rows('table_additional_information_single_page') ) { the_row();
                                ?> 
                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                    <div class="item">
                                        <?php the_sub_field('value_additional_information_single_page'); ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php if(get_field('callback_single_page')){ ?>
        <?php $image_url = wp_get_attachment_url(get_field('image_background_single_page')); ?>
        <div class="block__form" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/bg-form.jpg'; ?>')">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-lg-5">
                        <div class="form">
                            <?php
                                $forms_a = get_field('callback_single_page');
                                if($forms_a){
                                    echo do_shortcode('[contact-form-7 id=" ' . $forms_a . ' "]'); 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
	 
<?php get_footer(); ?>
