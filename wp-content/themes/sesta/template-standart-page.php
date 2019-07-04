<?php
/*
Template name: Standart page
*/

get_header(); 
?>
    
    <div class="content">
        <div class="block__content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                        
                        <?php if(get_post_meta( get_the_ID(), 'enable_block_a_section_standart_page', $single = true ) == 'yes'){ ?>
                        <div class="bg__video">
                            <a data-fancybox href="<?php echo get_field('link_videos_single_page'); ?>" class="iframe btn btn-video"><img src="/wp-content/themes/sesta/image/play.svg" alt="play"/>Смотреть фильм-презентацию</a>
                        </div>
                        <?php } ?>

                        <?php echo get_field('wp_textarea_content_block_a_standart_page'); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if( have_rows('table_additional_information_standart_page')){ ?>
        <div class="block__4 bg__rabitsa">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="title__block">
                            <?php echo get_field('wp_textarea_content_block_b_standart_page'); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="grid__3">
                            <div class="row">
                                <?php
                                    while ( have_rows('table_additional_information_standart_page') ) { the_row();
                                ?> 
                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                    <div class="item">
                                        <?php the_sub_field('value_additional_information_standart_page'); ?>
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
    
        <?php if(get_field('callback_standart_page')){ ?>
        <?php $image_url = wp_get_attachment_url(get_field('image_background_standart_page')); ?>
        <div class="block__form" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/bg-form.jpg'; ?>')">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-lg-5">
                        <div class="form">
                            <?php
                                $forms_a = get_field('callback_standart_page');
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