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
        <div class="block__4 bg__rabitsa" id="whyInUs">
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
                                <!--<div class="col-xs-12 col-sm-6 col-lg-4">
                                    <div class="item">
                                        <?php echo $block_b['wp_textarea_content_subblock_h_main_page']; ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                    <div class="item">
                                        <?php echo $block_b['wp_textarea_content_subblock_i_main_page']; ?>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
             
        <div class="block__2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="title__block"><p><?php echo get_field('title_content_block_a_main_page'); ?></p></div>
                    </div>
                    
                    <div class="col-xs-12 col-md-p-0">
                        <div class="products__carousel owl-carousel">
                            <?php
                                $all_categories = get_categories('hide_empty=0&exclude=1');
                                $category_link_array = array();
                                foreach( $all_categories as $single_cat ){
            
                                $image_url = get_field('image_content_block_a_rubric_page', 'category_' . $single_cat->term_id);
                            ?>
                                <div class="item">
                                    <a href="<?php echo get_category_link($single_cat->term_id); ?>" class="products__inner">
                                        <div class="products__img" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg' ?>')">
                                            <div class="products__title"><?php echo $single_cat->name; ?></div>
                                        </div>                                    
                                    </a>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
					<div class="col-xs-12"><div class="links__block2">
						<a href="<?php echo get_field('pricelist_content_block_a_main_page'); ?>" class="download__price"><img src="/wp-content/themes/sesta/image/downloadPrice.svg"/><?php echo get_field('title_pricelist_content_block_a_main_page'); ?></a>
                        <?php echo get_field('sub_pricelist_content_block_a_main_page'); ?>
                    </div></div>
                </div>
            </div>
        </div>
        
        <div class="block__video main__video">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-xs-p-0">
                        <div class="bg__video">
                            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                                <source src="<?php echo get_field('short_link_video_block_b_main_page'); ?>" type="video/mp4">
                            </video>
                            <a data-fancybox href="<?php echo get_field('full_link_video_block_b_main_page'); ?>" class="iframe btn btn-video"><img src="wp-content/themes/sesta/image/play.svg" alt="play"/><?php echo get_field('title_video_block_b_main_page'); ?></a>
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
                        <div class="title__block">
                            <?php echo $block_c['title_content_subblock_a_main_page']; ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="grid__1">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="map__box">
                                        <?php if( have_rows('repeater_content_block_a_main_page')){ ?>
                                        
                                        <script>	
                                            ymaps.ready(function () {
                                                var myMap = new ymaps.Map('map', {
                                                        center: [55.698653, 80.505405],
                                                        zoom: 3
                                                    }, {
                                                        searchControlProvider: 'yandex#search'
                                                    });
													
													myMap.controls
													// Кнопка изменения масштаба.
													.add('zoomControl', { left: 5, top: 5 })
													// Список типов карты
													.add('typeSelector')
													// Стандартный набор кнопок
													.add('mapTools', { left: 35, top: 5 });
                                                    
                                                    <?php
                                                        $i = 0;
                                                        $count = 0;
 
                                                        while ( have_rows('repeater_content_block_a_main_page') ) { the_row();
                                                        $i++;
                                                        $count++;                                                  
                                                    ?>
                                                    
                                                        myPlacemark<?php echo $i; ?> = new ymaps.Placemark([<?php the_sub_field('placemark_subblock_main_page'); ?>], {
                                                            hintContent: '<?php the_sub_field('hintcontent_subblock_main_page'); ?>',
                                                            balloonContent: '<?php the_sub_field('ballooncontent_subblock_main_page'); ?>'
                                                        }, {
                                                            
                                                            iconLayout: 'default#image',
                                                            iconImageHref: '<?php the_sub_field('iconimagehref_subblock_main_page'); ?>',
                                                            <?php
                                                                $size = getimagesize(get_sub_field('iconimagehref_subblock_main_page'));
                                                            ?>
                                                            iconImageSize: [<?php echo isset($size[0]) ? $size[0] : ''; ?>, <?php echo isset($size[1]) ? $size[1] : ''; ?>],
                                                            //iconImageSize: [46, 58],
                                                            iconImageOffset: [-23, -55]
                                                        }) <?php if($i == $count) {echo '';}else{echo ','; }?>
                                                    <?php } ?>

                                                    <?php
                                                        $i = 0;
                                                        while ( have_rows('repeater_content_block_a_main_page') ) { the_row();
                                                        $i++;
                                                    ?>
                                                    myMap.geoObjects.add(myPlacemark<?php echo $i; ?>);
                                                    <?php } ?>
                                                    
                                            });
                                        </script>	                      
                                        <?php } ?>
                                        
                                        <div id="map"></div>
                                        
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