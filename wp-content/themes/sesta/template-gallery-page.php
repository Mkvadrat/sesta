<?php
/*
Template name: Gallery page
*/

get_header(); 
?>
    
    <div class="content">
        <div class="block__4">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="title__block">
                            <p><?php echo get_field('title_images_gallery_page'); ?></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="grid__3 grid__gallery">
                            <div class="row">
                                <?php
                                    global $nggdb;
                                    $gallery_id = getNextGallery(get_the_ID(), 'images_gallery_page');
                                    $gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                                    if($gallery_image){
                                        foreach($gallery_image as $image) { 
                                    ?>
                                    <div class="col-xs-12 col-sm-6 col-lg-4">
                                        <div class="item">
                                            <div class="gallery__inner">
                                                <a href="<?php echo nextgen_esc_url($image->imageURL); ?>" class="gallery__img" data-fancybox="images" data-caption="<?php echo htmlspecialchars_decode($image->alttext); ?>" style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>')"></a>
                                                <div class="gallery__title"><?php echo $image->alttext; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if( have_rows('videos_gallery_page')){ ?>
        <div class="block__1">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="title__block">
                            <p><?php echo get_field('title_videos_gallery_page'); ?></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="grid__1">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                        while ( have_rows('videos_gallery_page') ) { the_row();
                                    ?>
                                    <div class="bg__video">
                                        <a data-fancybox href="<?php the_sub_field('link_videos_gallery_page'); ?>" class="iframe btn btn-video"><img src="/wp-content/themes/sesta/image/play.svg" alt="play"/>Смотреть видео</a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
            
<?php get_footer(); ?>