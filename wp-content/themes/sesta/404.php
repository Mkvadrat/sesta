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
    
       <div class="banner__top bg__rabitsa page__404">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <h1>404</h1>
                    <p>Ошибка 404 - данная станица не найдена.</p>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-back center-block">Назад</a>
                </div>
            </div>
        </div>
    </div>
            
<?php get_footer(); ?>