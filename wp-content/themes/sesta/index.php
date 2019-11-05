<?php
/*
Theme Name: Sesta
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/

get_header(); ?>
    
    <div class="content">
        <div class="block__content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                        <?php if (have_posts()): while (have_posts()): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
