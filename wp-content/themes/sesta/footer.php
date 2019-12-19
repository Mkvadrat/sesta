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

    <footer>
        <div class="container">
            <div class="row footer__top">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php $image_url = wp_get_attachment_url(getMeta('image_block_footer_main_page')); ?>
                        <img src="<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/logo-f.svg'; ?>" alt="logo"/>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3"><p><?php echo getMeta('text_block_a_footer_main_page'); ?></p></div>
                <div class="col-xs-12 col-sm-6 col-md-3"><small><?php echo getMeta('text_block_b_footer_main_page'); ?></small></div>
                <div class="col-xs-12 col-sm-6 col-md-3"><a class="btn btn-call" data-toggle="modal" data-target="#callback">Написать нам</a></div>
                <div class="col-xs-12">
                    <hr>
                </div>
            </div>
            <div class="row footer__bottom">
                <div class="col-xs-12 col-sm-6">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="footer__title"><?php echo getMeta('text_block_c_footer_main_page'); ?></div>
                            <?php
                                if (has_nav_menu('footer_a_menu')){
                                    wp_nav_menu( array(
                                        'theme_location'  => 'footer_a_menu',
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
                        <div class="col-xs-12 col-md-6 products__links">
                            <div class="footer__title"><?php echo getMeta('text_block_d_footer_main_page'); ?></div>
                            <?php
                                if (has_nav_menu('footer_b_menu')){
                                    wp_nav_menu( array(
                                        'theme_location'  => 'footer_b_menu',
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
                <div class="col-xs-12 col-sm-6">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 footer__contacts">
                            <div class="footer__title"><?php echo getMeta('text_block_e_footer_main_page'); ?></div>
                            <?php echo getMeta('wp_textarea_block_a_footer_main_page'); ?>
                        </div>
                        <div class="col-xs-12 col-md-6 footer__power">
                            <div class="footer__title"><?php echo getMeta('text_block_f_footer_main_page'); ?></div>
                            <?php echo getMeta('wp_textarea_block_b_footer_main_page'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- The menu -->
<nav id="menu">
    <?php
        if (has_nav_menu('mobile_a_menu')){
            wp_nav_menu( array(
                'theme_location'  => 'mobile_a_menu',
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
                'depth'           => 2,
                'walker'          => new mobile_menu(),
            ) );
        }
    ?>
</nav>

<!-- The modal form -->
<div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="form form__modal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <img src="<?php echo esc_url( get_template_directory_uri() ) . '/image/close.svg'; ?>" alt="close"/>
            </button>
            <?php
                $forms_a = getMeta('callback_block_footer_main_page');
                if($forms_a){
                    echo do_shortcode('[contact-form-7 id=" ' . $forms_a . ' "]'); 
                }
            ?>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>