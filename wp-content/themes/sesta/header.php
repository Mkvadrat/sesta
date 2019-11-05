<?php
/*
Theme Name: Sesta
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo mkvadrat_wp_title('','|', true, 'right'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php wp_head(); ?>
</head>
<body>
    
<!-- The page -->
<div class="page">
    <header class="header">
        <a href="#menu" class="mburger mburger--tornado Fixed">
            <b></b>
            <b></b>
            <b></b>
        </a>
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-4 col-lg-3"><p><?php echo getMeta('text_block_a_header_main_page'); ?></p></div>
                    <div class="col-sm-3 col-md-4 col-lg-3"><p><?php echo getMeta('text_block_b_header_main_page'); ?></p></div>
                    <div class="col-sm-6 col-md-4 col-lg-6 text-right"><p><?php echo getMeta('text_block_c_header_main_page'); ?></p></div>
                </div>
            </div>
        </div>
        <div class="header__middle">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-lg-3">
                        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img
                              src="<?php header_image(); ?>"
                              height="<?php echo get_custom_header()->height; ?>"
                              width="<?php echo get_custom_header()->width; ?>"
                              alt="logotype"
                            />
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-lg-4"><p><?php echo getMeta('text_block_d_header_main_page'); ?></p></div>
                    <div class="col-xs-12 col-sm-5 ppb"><?php echo getMeta('text_block_e_header_main_page'); ?></div>
                </div>
            </div>
        </div>
        <div class="header__bottom hidden-xs hidden-sm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="menu__top">
                            <?php
                                if (has_nav_menu('header_a_menu')){
                                    wp_nav_menu( array(
                                        'theme_location'  => 'header_a_menu',
                                        'menu'            => '',
                                        'container'       => false,
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'menu_class'      => '',
                                        'menu_id'         => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'before'          => '',
                                        'after'           => '',
                                        'link_before'     => '',
                                        'link_after'      => '',
                                        'items_wrap'      => '<ul class="nav">%3$s</ul>',
                                        'depth'           => 2,
                                        'walker'          => new header_menu(),
                                    ) );
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <?php if(is_front_page()){ ?>
    <div class="slider__main">
        <div class="owl-carousel">
            <?php
                global $nggdb;
                $gallery_id = getNextGallery(get_the_ID(), 'gallery_block_header_main_page');
                $gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                if($gallery_image){
                    foreach($gallery_image as $image) { 
                ?>
                    <div class="item" style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>')">
                        <div class="carousel__inner">
                            <?php echo htmlspecialchars_decode($image->description, ENT_QUOTES); ?>
                        </div>
                    </div>
                <?php
                    }
                }
            ?>
        </div>
    </div>

    <div class="banner__top bg__rabitsa main__banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 hidden-xs hidden-sm">
                    <div class="menu__second">
                        <?php
                            if (has_nav_menu('header_b_menu')){
                                wp_nav_menu( array(
                                    'theme_location'  => 'header_b_menu',
                                    'menu'            => '',
                                    'container'       => false,
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul>%3$s</ul>',
                                    'depth'           => 1,
                                ) );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <?php echo getMeta('wp_textarea_block_header_main_page'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php }elseif(is_category()){ ?>
    <?php $category = get_queried_object(); ?>
    <?php
        $image_url = wp_get_attachment_image_src( get_term_meta(get_queried_object()->term_id, 'image_content_block_a_rubric_page', true), 'full');
    ?>
    <div class="banner__top bg__banner" data-parallax="scroll" data-image-src="<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/bg-prod.jpg' ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 hidden-xs hidden-sm">
                    <div class="menu__second">
                        <?php
                            if (has_nav_menu('header_b_menu')){
                                wp_nav_menu( array(
                                    'theme_location'  => 'header_b_menu',
                                    'menu'            => '',
                                    'container'       => false,
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul>%3$s</ul>',
                                    'depth'           => 1,
                                ) );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <h1><?php echo $category->name; ?></h1>
                    <?php echo get_term_meta(get_queried_object()->term_id, 'short_description_all_page', true); ?>
                </div>
            </div>
        </div>
    </div>
    <?php }elseif(is_single()){ ?>
    <?php
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full'); 
    ?>
    <div class="banner__top bg__banner" data-parallax="scroll" data-image-src="<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/bg-prod.jpg' ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 hidden-xs hidden-sm">
                    <div class="menu__second">
                        <?php
                            if (has_nav_menu('header_b_menu')){
                                wp_nav_menu( array(
                                    'theme_location'  => 'header_b_menu',
                                    'menu'            => '',
                                    'container'       => false,
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul>%3$s</ul>',
                                    'depth'           => 1,
                                ) );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <h1><?php the_title(); ?></h1>
                    <?php echo get_field('short_description_all_page', get_the_ID()); ?>
                </div>
            </div>
        </div>
    </div>
    <?php }elseif(is_404()){ ?>
    <div class="page__404 single__content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 hidden-xs hidden-sm">
                    <div class="menu__second">
                        <?php
                            if (has_nav_menu('header_b_menu')){
                                wp_nav_menu( array(
                                    'theme_location'  => 'header_b_menu',
                                    'menu'            => '',
                                    'container'       => false,
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul>%3$s</ul>',
                                    'depth'           => 1,
                                ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }else{ ?> 
    <?php
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full'); 
    ?>
    <div class="banner__top bg__banner" data-parallax="scroll" data-image-src="<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/bg-prod.jpg' ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 hidden-xs hidden-sm">
                    <div class="menu__second">
                        <?php
                            if (has_nav_menu('header_b_menu')){
                                wp_nav_menu( array(
                                    'theme_location'  => 'header_b_menu',
                                    'menu'            => '',
                                    'container'       => false,
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul>%3$s</ul>',
                                    'depth'           => 1,
                                ) );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <h1><?php the_title(); ?></h1>
                    <?php echo get_field('short_description_all_page', get_the_ID()); ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    