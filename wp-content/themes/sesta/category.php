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
    
    <?php $category = get_queried_object(); ?>
    <div class="content">
        <div class="block__2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="title__block"><p><?php echo get_term_meta(get_queried_object()->term_id, 'title_content_block_a_rubric_page', true); ?></p></div>
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
                                                if($category->term_id == $single_cat->term_id){
                                                    echo '<a class="active" href="' . get_category_link($single_cat->term_id) . '">' . $single_cat->name . '</a>';
                                                }else{
                                                    echo '<a href="' . get_category_link($single_cat->term_id) . '">' . $single_cat->name . '</a>';
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'id',
                                    'terms' => array( get_queried_object()->term_id )
                                )
                            ),
                            'post_type' => 'post',
                            'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
                            'paged'          => $current_page,
                            'post_status' => 'publish',
                            'orderby'     => 'date',
                            'order'       => 'DESC'
                        );
            
                        $posts = get_posts( $args );
                        
                        if($posts){
                    ?>
                    <div class="col-xs-12">
                        <div class="products__carousel category__grid">
                            
                            <?php foreach($posts as $post){ ?>
                                <?php
                                    $image_url = get_field('image_single_page', $post->ID);
                                ?>
                                <div class="item">
                                    <a href="<?php echo get_permalink($post->ID); ?>" class="products__inner">
                                        <div class="products__img"
                                             style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')"></div>
                                        <div class="products__title"><?php echo $post->post_title; ?></div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="col-xs-12">
                    <div class="products__carousel category__grid">
                        <p>Продукция не найдена!</p>
                    </div>
                </div>
                <?php } ?>
                
                <?php
                    $defaults = array(
                        'type' => 'array',
                        'prev_next'    => True,
                        'prev_text'    => __(''),
                        'next_text'    => __(''),
                    );

                    $pagination = paginate_links($defaults);
                    
                if($pagination){
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="pagination">
                            <?php foreach ($pagination as $pag){ ?>
                                <li class="page-item"><?php echo $pag; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <hr class="hr__full"/>

        <div class="block__content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                        <?php echo get_term_meta(get_queried_object()->term_id, 'wp_textarea_content_block_a_rubric_page', true); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    
<?php get_footer(); ?>