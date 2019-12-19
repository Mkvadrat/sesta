<?php
/*
Template name: About page
*/

get_header(); 
?>

    <div class="content">
        <div class="block__content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                        <?php echo get_field('description_block_about_page'); ?>
                        
                        <?php
                            global $nggdb;
                            $gallery_id = getNextGallery(get_the_ID(), 'banner_block_about_page');
                            $gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                            if($gallery_image){
                        ?>
                        <!--<div class="slider__about">
                            <div class="owl-carousel">
                                <?php foreach($gallery_image as $image) { ?>
                                <div class="item" style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>')">
                                    <div class="carousel__inner">
                                        <div class="carousel__title"><?php echo $image->alttext; ?></div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>-->
                        <div class="slider__about">
                            <div class="owl-carousel">
                                <?php foreach($gallery_image as $image) { ?>
                                <div class="item">
									<img src="<?php echo nextgen_esc_url($image->imageURL); ?>" alt="<?php echo $image->alttext; ?>"/>
                                    <div class="carousel__inner">
                                        <div class="carousel__title"><?php echo $image->alttext; ?></div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php get_footer(); ?>